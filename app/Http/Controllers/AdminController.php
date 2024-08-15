<?php
namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function createProduct() {
        return view('admin.create_product');
    }
}
