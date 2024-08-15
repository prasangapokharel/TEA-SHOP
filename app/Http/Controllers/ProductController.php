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

    public function show($id) {
        $product = Product::findOrFail($id);
        return view('product_view', compact('product'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // Adjust validation as needed
        ]);
    
        // Store the image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('products'), $imageName);
        } else {
            $imageName = 'default.jpg'; // Or handle default case
        }
    
        // Create the product
        Product::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'image' => $imageName,
        ]);
    
        return redirect()->back()->with('success', 'Product added successfully');
    }
    
}
