<?php

namespace App\Http\Controllers;

use App\ThirdParty\Supabase;
use Illuminate\Http\Request;
use App\Models\Product;
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

        $product = new Product();
        $createdProduct = $product->createProduct([
            'merchant_id' => auth()->user()->id,
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

        return redirect()->view('products', [
            'product' => $createdProduct,
        ]);
    }

    public function getProducts(Request $request)
    {
        $product = new Product();
        $products = $product->getProducts();

        return response()->view('shop', [
            'products' => $products,
        ]);
    }

    public function getProduct(Request $request)
    {
        $product = new Product();
        $product = $product->getProductByID($request->input('id'));

        return response()->view('product', [
            'product' => $product,
        ]);
    }

    public function updateProduct(Request $request)
    {
        $product = new Product();
        $product->updateProduct([
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'category' => $request->input('category'),
            'condition' => $request->input('condition'),
            'stock' => $request->input('stock'),
            'discount' => $request->input('discount'),
            'time_usage' => $request->input('time_usage'),
            'is_promotion' => $request->input('is_promotion'),
        ]);

        return redirect()->view('product', [
            'product' => $product,
        ]);
    }

    public function deleteProduct(Request $request)
    {
        $product = new Product();
        $product->deleteProduct($request->input('id'));

        return redirect()->view('products');
    }
}
