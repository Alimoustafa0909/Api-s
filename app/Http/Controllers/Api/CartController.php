<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Course;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $course = Course::findOrFail($request->course_id);

        // Create a new cart item
        $cartItem = new CartItem([
            'course_id' => $course->id,
            'quantity' => $request->quantity,
            'price' => $course->price,
            'course_name' => $course->title,
            'subtotal' => $course->price * $request->quantity,
            'total' => $course->price * $request->quantity,
        ]);

        // Save the cart item
        $cartItem->save();

        return response()->json(['message' => 'Course added to cart successfully'], 201);
    }
}
