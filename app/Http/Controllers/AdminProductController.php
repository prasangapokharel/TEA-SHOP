<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function create()
    {
        return view('admin.create-product');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
    
        // Get the image file
        $image = $request->file('image');
        $imageData = file_get_contents($image->getRealPath());
    
        // Create the product
        Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imageData, // Store the image data
        ]);
    
        return redirect()->back()->with('success', 'Product added successfully');
    }
    
}
