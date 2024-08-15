<?php
namespace App\Http\Controllers;

use App\Models\Product; // Import the Product model
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch products from the database
        $products = Product::all();

        // Pass products to the view
        return view('home', compact('products'));
    }
}
