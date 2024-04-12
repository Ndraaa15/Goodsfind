<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function wishlist()
    {
        return view('wishlist');
    }
    public function addWishlist(int $product_id)
    {
        $wishlist = new Wishlist();
        $wishlist->addWishlist([
            'product_id' => $product_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('product', ['id' => $product_id]);
    }

    public function deleteWishlist(int $product_id)
    {
        $wishlist = new Wishlist();
        $wishlist->deleteWishlist($product_id, auth()->user()->id);

        return redirect()->route('product', ['id' => $product_id]);
    }
}
