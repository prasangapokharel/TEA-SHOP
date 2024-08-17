<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Fetch all products from the database
        $products = Product::all();
        // Return the view with the products
        return view('product', compact('products'));
    }
    
    public function show($id)
    {
        // Fetch a single product by its ID
        $product = Product::findOrFail($id);
        // Return the view for the product
        return view('product.show', compact('product'));
    }
    public function create()
    {
        // Return view for creating a product
        return view('admin.create-product');
    }

   
   public function store(Request $request)
   {
       $request->validate([
           'title' => 'required|string|max:255',
           'description' => 'required|string',
           'price' => 'required|numeric',
           'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       $product = new Product();
       $product->title = $request->input('title');
       $product->description = $request->input('description');
       $product->price = $request->input('price');

       if ($request->hasFile('image')) {
           $image = $request->file('image');
           $imageName = time() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('images'), $imageName);
           $product->image = $imageName;
       }

       $product->save();

       return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
   }
}
