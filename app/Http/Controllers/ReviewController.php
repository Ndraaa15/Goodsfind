<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function add_review(Request $request, int $product_id)
    {
        try {
            DB::beginTransaction();
            $reviewModel = new Review();
            $productModel = new Product();

            $product = $productModel->get_product_by_id($product_id);
            $product->total_review = $product->total_reviews + 1;
            $product->rating = ($product->rating + $request->input('rating')) / $product->total_review;
            $productModel->update_product($product);

            $review = $reviewModel->create_review([
                'product_id' => $product_id,
                'user_id' => auth()->user()->id,
                'review' => $request->input('review'),
                'sub_review' => $request->input('sub_review'),
                'rating' => $request->input('rating'),
            ]);
            DB::commit();
            dd($review->load('product'));
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function get_review(int $product_id)
    {
        $reviewModel = new Review();
        $reviews = $reviewModel->get_review_by_product_id($product_id);
        dd($reviews);
    }

    public function update_review(Request $request, int $product_id)
    {
        try {
            DB::beginTransaction();
            $reviewModel = new Review();
            $productModel = new Product();

            $review = $reviewModel->get_review_by_user_product_id($product_id, auth()->user()->id);
            $product = $productModel->get_product_by_id($product_id);

            $updateReview = [
                'review' => $review->review,
                'sub_review' => $review->sub_review,
                'rating' => $review->rating,
            ];

            if (!empty($request->input('rating'))) {
                $review->rating = $request->input('rating');
                $updateReview['rating'] = $request->input('rating');
                $product->rating = ($product->rating - $review->rating + $request->input('rating')) / $product->total_review;
                $productModel->update_product($product);
            }

            if (!empty($request->input('review'))) {
                $review->review = $request->input('review');
                $updateReview['review'] = $request->input('review');
            }

            if (!empty($request->input('sub_review'))) {
                $review->sub_review = $request->input('sub_review');
                $updateReview['sub_review'] = $request->input('sub_review');
            }

            $reviewModel->update_review($updateReview, $product_id, auth()->user()->id);
            DB::commit();
            dd($review->load('product'));
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function delete_review(int $product_id)
    {
        try {
            DB::beginTransaction();
            $reviewModel = new Review();
            $productModel = new Product();

            $review = $reviewModel->get_review_by_user_product_id($product_id, auth()->user()->id);
            $product = $productModel->get_product_by_id($review->product_id);

            $product->total_review = $product->total_review - 1;
            if ($product->total_review == 0) {
                $product->rating = 0;
            } else {
                $product->rating = ($product->rating - $review->rating) / $product->total_review;
            }
            $productModel->update_product($product);

            $reviewModel->delete_product($product_id, auth()->user()->id);
            DB::commit();
            dd('Review deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
