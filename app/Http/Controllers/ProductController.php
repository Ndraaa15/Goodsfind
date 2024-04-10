<?php

namespace App\Http\Controllers;

use App\ThirdParty\Supabase;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Merchant;
use App\ProductCondition;
use Illuminate\Validation\Rules\Enum;

class ProductController extends Controller
{
    public function products(){
        return view('shop');
    }
    public function product()
    {
        return view('product');
    }

    public function createProduct(Request $request)
    {

        $supabase = new Supabase();
        $supabase->uploadImage($request->file('image'));
        $image_url = $supabase->getSignedUrl($request->file('image'));

        validator($request->all(), [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'category' => ['required', new Enum(ProductCondition::class)],
            'condition' => ['required', 'string'],
            'stock' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],
            'time_usage' => ['required', 'numeric'],
            'is_promotion' => ['required', 'boolean'],
        ]);

        $productModel = new Product();
        $merchantModel = new Merchant();

        $merchant = $merchantModel->getMerchantByUserID(auth()->user()->id);

        $createdProduct = $productModel->createProduct([
            'merchant_id' => $merchant->id,
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $image_url,
            'category' => $request->input('category'),
            'condition' => $request->input('condition'),
            'stock' => $request->input('stock'),
            'discount' => $request->input('discount'),
            'time_usage' => $request->input('time_usage'),
            'is_promotion' => $request->input('is_promotion'),
        ]);

        //minus view
        return redirect()->view('shop', [
            'product' => $createdProduct,
        ]);
    }

    public function getAllProduct()
    {
        $product = new Product();
        $products = $product->getAllProduct();

        //minus view
        return response()->view('shop', [
            'products' => $products,
        ]);
    }


    public function getProductByID(int $id)
    {
        $product = new Product();
        $product = $product->getProductByID($id);

        return response()->view('product', [
            'product' => $product,
        ]);
    }

    public function updateProduct(Request $request, int $id)
    {
        $productModel = new Product();
        $product = $productModel->getProductByID($id);


        if (!empty($request->file('image'))) {
            $supabase = new Supabase();
            $supabase->uploadImage($request->file('image'));
            $image_url = $supabase->getSignedUrl($request->file('image'));
            $product->image = $image_url;
        }

        if (!empty($request->input('name'))) {
            $product->name = $request->input('name');
        }

        if (!empty($request->input('description'))) {
            $product->description = $request->input('description');
        }

        if (!empty($request->input('price'))) {
            $product->price = $request->input('price');
        }

        if (!empty($request->input('category'))) {
            $product->category = $request->input('category');
        }

        if (!empty($request->input('condition'))) {
            $product->condition = $request->input('condition');
        }

        if (!empty($request->input('stock'))) {
            $product->stock = $request->input('stock');
        }

        if (!empty($request->input('discount'))) {
            $product->discount = $request->input('discount');
        }

        if (!empty($request->input('time_usage'))) {
            $product->time_usage = $request->input('time_usage');
        }

        if (!empty($request->input('is_promotion'))) {
            $product->is_promotion = $request->input('is_promotion');
        }

        $productModel->updateProduct($product);

        //minus view
        return redirect()->view('shop', [
            'product' => $product,
        ]);
    }

    public function deleteProduct(int $id)
    {
        $product = new Product();
        $product->deleteProduct($id);

        //minus view
        return redirect()->view('shop');
    }
}
