<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('home', compact('products'));
    }

    public function show($id)
{
    $product = Product::findOrFail($id);
    return view('product.show', compact('product'));
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

    // Handle the file upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagePath = $image->store('products', 'public'); // Store image in the 'products' folder in 'public'

        // Create the product
        Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imagePath, // Store the path to the image
        ]);
    }

    return redirect()->back()->with('success', 'Product added successfully');
}

    
}
