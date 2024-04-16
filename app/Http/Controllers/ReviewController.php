<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function add_review(Request $request)
    {
        try {
            DB::beginTransaction();
            $reviewModel = new Review();
            $review = $reviewModel->get_review_by_user_id(auth()->user()->id);

            if (empty($review)) {
                $request->validate([
                    'review' => ['required', 'string'],
                    'rating' => ['required', 'numeric', 'min:1', 'max:5'],
                ]);

                $review = $reviewModel->create_review([
                    'user_id' => auth()->user()->id,
                    'review' => $request->input('review'),
                    'rating' => $request->input('rating'),
                ]);
            } else {
                $request->validate([
                    'review' => ['required', 'string'],
                    'rating' => ['required', 'numeric', 'min:1', 'max:5'],
                ]);

                $updateReview = [
                    'review' => $review->review,
                    'rating' => $review->rating,
                ];

                if (!empty($request->input('rating'))) {
                    $review->rating = $request->input('rating');
                    $updateReview['rating'] = $request->input('rating');
                }

                if (!empty($request->input('review'))) {
                    $review->review = $request->input('review');
                    $updateReview['review'] = $request->input('review');
                }

                $reviewModel->update_review($updateReview, auth()->user()->id);
            }

            DB::commit();
            return redirect()->route('profile');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function get_all_review()
    {
        $reviewModel = new Review();
        $reviews = $reviewModel->get_all_review();
        return redirect()->route('about', ['reviews' => $reviews->load('user')]);
    }
}
