<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function add_wishlist(int $product_id)
    {
        try {
            DB::beginTransaction();
            $wishlistModel = new Wishlist();
            $wishlist = $wishlistModel->create_wishlist([
                'product_id' => $product_id,
                'user_id' => auth()->user()->id,
            ]);
            DB::commit();
            // $wishlistWithProduct = $wishlist->load('product');
            return redirect()->route('wishlist');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function delete_wishlist(int $product_id)
    {
        try {
            DB::beginTransaction();
            $wishlistModel = new Wishlist();
            $wishlistModel->delete_wishlist($product_id, auth()->user()->id);
            DB::commit();
            return redirect()->route('wishlist');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function get_wishlist()
    {
        $wishlistModel = new Wishlist();
        $wishlists = $wishlistModel->get_wishlist(auth()->user()->id);
        $wishlistsWithProduct = $wishlists->load('product');
        return view('user.wishlist', [
            'wishlists' => $wishlistsWithProduct,
        ]);
    }

    public static function count_wishlist()
    {
        $wishlistModel = new Wishlist();
        return  $wishlistModel->count_wishlist(auth()->user()->id);
    }
}
