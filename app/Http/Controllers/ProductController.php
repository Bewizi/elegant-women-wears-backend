<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'details' => 'required|string',
            'price' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'inStock' => 'required|boolean',
            'rating' => 'nullable|numeric',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product', 'public');
            $validated['image'] = $imagePath;
        }

        $product = Product::create($validated);
        response()->json($product, 201);
    }

    public function index()
    {
        // return response->json(Product::all());
        // Product::all();

        return response()->json(Product::all()); 
    }

    // public function get()
    // {
    //     return Product::all();
    // }

    public function getProductById(Request $request)
    {
        $id=$request->query('id');
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }
        return response()->json($product);

    }

    public function getThree(Request $request)
    {
        $product = Product::take(3)->get();

        return response()->json($product);
    }
}
