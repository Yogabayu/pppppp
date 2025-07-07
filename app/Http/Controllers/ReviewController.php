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
            $review = Review::create($request->validated());
            return response()->json($review, 201);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Failed to create review'], 500);
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
