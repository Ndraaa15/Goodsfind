<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function addReview(Request $request)
    {
        $review = new Review();
        $review->addReview([
            'product_id' => $request->input('product_id'),
            'user_id' => auth()->user()->id,
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('product', ['id' => $request->input('product_id')]);
    }
}
