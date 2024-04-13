<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function wishlist()
    {
        return view('wishlist');
    }

    public function add_wishlist(int $product_id)
    {
        try{
            DB::beginTransaction();
            $wishlistModel = new Wishlist();
            $wishlist = $wishlistModel->create_wishlist([
                'product_id' => $product_id,
                'user_id' => auth()->user()->id,
            ]);
            DB::commit();
            $wishlistWithProduct = $wishlist->load('product');
            dd($wishlistWithProduct);
        }
        catch(\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function delete_wishlist(int $product_id)
    {
        try{
            DB::beginTransaction();
            $wishlistModel = new Wishlist();
            $wishlistModel->delete_wishlist($product_id, auth()->user()->id);
            DB::commit();
            dd('Wishlist deleted!');
        }
        catch(\Exception $e){
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function get_wishlist()
    {
        $wishlistModel = new Wishlist();
        $wishlists = $wishlistModel->get_wishlist(auth()->user()->id);
        $wishlistsWithProduct = $wishlists->load('product');
        dd($wishlistsWithProduct);
    }
}
