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
            $reviews = Review::all();
            return view('admin.pages.review', compact('reviews'));
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
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
            $review->status = $request->input('status', 'pending'); // Default to 'pending' if not provided
            $review->ip_address = $request->ip();
            $review->user_agent = $request->header('User-Agent');
            $review->rating = $request->input('rating'); 
            if ($request->hasFile('photo')) {
                $review->photo = $request->file('photo')->store('reviews', 'public');
            } else {
                $review->photo = null; // Handle case where no photo is uploaded
            }
            $review->save();
            return redirect()->back()->with('success', 'Thank you! Your review has been submitted.');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            // return redirect()->back()->with('error', 'Something went wrong. Please try again later.' . $th->getMessage());
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        try {
            $review->name = $request->input('name');
            $review->email = $request->input('email');
            $review->subject = $request->input('subject');
            $review->message = $request->input('message');
            $review->status = $request->input('status');
            $review->rating = $request->input('rating'); 
            $review->photo = $request->file('photo') ? $request->file('photo')->store('reviews', 'public') : $review->photo;
            $review->save();
            return redirect()->route('review.index')->with('success', 'Review updated successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to load review for editing: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        try {
            $review->delete();
            return back()->with('success', 'Review deleted successfully.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete review: ' . $th->getMessage());
        }
    }
}
