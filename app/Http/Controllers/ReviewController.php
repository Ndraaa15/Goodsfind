<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;

class ReviewController extends Controller
{
    public function addReview(Request $request, int $product_id)
    {
        $reviewModel = new Review();
        $productModel = new Product();

        $product = $productModel->getProductById($product_id);
        $product->total_review = $product->total_reviews + 1;
        $product->rating = ($product->rating + $request->input('rating')) / $product->total_review;
        $productModel->updateProduct($product);

        $reviewModel->createReview([
            'product_id' => $product_id,
            'user_id' => auth()->user()->id,
            'review' => $request->input('review'),
            'sub_review' => $request->input('sub_review'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->view('product', ['product_id' => $product_id]);
    }

    public function getReview(int $product_id)
    {
        $reviewModel = new Review();
        $reviews = $reviewModel->getReviewByProductId($product_id);
        return redirect()->view('product', ['reviews' => $reviews, 'product_id' => $product_id]);
    }

    public function deleteReview(int $review_id)
    {
        $reviewModel = new Review();
        $productModel = new Product();

        $review = $reviewModel->getReviewById($review_id);
        $product = $productModel->getProductById($review->product_id);

        $product->total_review = $product->total_reviews - 1;
        $product->rating = ($product->rating - $review->rating) / $product->total_review;
        $productModel->updateProduct($product);

        $reviewModel->deleteReview($review_id);

        return redirect()->view('product', ['product_id' => $review->product_id]);
    }
}
