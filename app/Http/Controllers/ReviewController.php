<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('review');
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to load reviews'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $review = new Review();
            $review->name = $request->input('name');
            $review->email = $request->input('email');
            $review->subject = $request->input('subject');
            $review->message = $request->input('review');
            $review->status = 'pending';
            $review->ip_address = $request->ip();
            $review->user_agent = $request->header('User-Agent');
            $review->rating = $request->input('rating'); 
            $review->save();
            return redirect()->back()->with('success', 'Thank you! Your review has been submitted.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.' . $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        try {
            $review->delete();
            return response()->json(['message' => 'Review deleted successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to delete review'], 500);
        }
    }
}
