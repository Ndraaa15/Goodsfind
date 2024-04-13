<?php

namespace App\Http\Controllers;

use App\ThirdParty\Supabase;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Merchant;
use App\ProductCondition;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class ProductController extends Controller
{
    public function products_page()
    {
        return view('shop');
    }
    public function product_page()
    {
        return view('product');
    }

    public function create_product(Request $request)
    {
        try {
            DB::beginTransaction();
            $supabase = new Supabase();
            $productModel = new Product();
            $merchantModel = new Merchant();

            if (!request()->hasFile('image')) {
                throw new \Exception('Image is required');
            }

            $productImage = $request->file('image');
            $fileName = time() . "-" . $productImage->getClientOriginalName();
            $supabase->upload_image($productImage, $fileName);
            $imageUrl = $supabase->get_signed_url($fileName);

            $request->validate(
                [
                    'name' => ['required', 'string'],
                    'description' => ['required', 'string'],
                    'price' => ['required', 'numeric'],
                    'category' => ['required', 'string'],
                    'condition' => ['required',  new Enum(ProductCondition::class)],
                    'stock' => ['required', 'numeric'],
                    'discount' => ['required', 'numeric'],
                    'time_usage' => ['required', 'numeric'],
                    'is_promotion' => ['required', 'boolean'],
                ]
            );
            $merchant = $merchantModel->get_merchant_by_user_id(auth()->user()->id);

            $product = $productModel->create_product([
                'merchant_id' => $merchant->id,
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'image' => $imageUrl,
                'category' => $request->input('category'),
                'condition' => $request->input('condition'),
                'stock' => $request->input('stock'),
                'discount' => $request->input('discount'),
                'time_usage' => $request->input('time_usage'),
                'is_promotion' => $request->input('is_promotion'),
            ]);
            DB::commit();
            dd($product);
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function get_all_product()
    {
        $product = new Product();
        $products = $product->get_all_product();

        dd($products);
    }


    public function get_product_by_id(int $id)
    {
        $product = new Product();
        $product = $product->get_product_by_id($id);

        dd($product);
    }

    public function update_product(Request $request, int $id)
    {
        try{
            DB::beginTransaction();
            $productModel = new Product();
            $product = $productModel->get_product_by_id($id);

            if (!empty($request->file('image'))) {
                $supabase = new Supabase();
                $productImage = $request->file('image');
                $fileName = time() . "-" . $productImage->getClientOriginalName();
                $supabase->upload_image($productImage, $fileName);
                $image_url = $supabase->get_signed_url($fileName);
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

            $productModel->update_product($product);
            DB::commit();
            dd($product);
        }
        catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function delete_product(int $id)
    {
        $product = new Product();
        $product->delete_product($id);

        dd('Product deleted');
    }
}
