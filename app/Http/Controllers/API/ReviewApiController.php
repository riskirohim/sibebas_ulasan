<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ReviewApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::with('product')->get();
        return response()->json(['reviews' => $reviews], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string',
            ]);

            $review = Review::create($request->all());
            return response()->json(['message' => 'Ulasan berhasil ditambahkan!', 'review' => $review], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $review = Review::with('product')->find($id);

        if (!$review) {
            return response()->json(['message' => 'Ulasan tidak ditemukan.'], 404);
        }

        return response()->json(['review' => $review], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $review = Review::find($id);

            if (!$review) {
                return response()->json(['message' => 'Ulasan tidak ditemukan.'], 404);
            }

            $request->validate([
                'product_id' => 'required|exists:products,id',
                'rating' => 'required|integer|min:1|max:5',
                'comment' => 'nullable|string',
            ]);

            $review->update($request->all());
            return response()->json(['message' => 'Ulasan berhasil diperbarui!', 'review' => $review], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Ulasan tidak ditemukan.'], 404);
        }

        $review->delete();
        return response()->json(['message' => 'Ulasan berhasil dihapus!'], 200);
    }
}
