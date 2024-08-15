@extends('layouts.app')

@section('title', 'Welcome to Timalya')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<!-- Navigation Bar -->
<nav class="navbar">
    <div class="logo">Timalya</div>
    <ul>
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
        <li><a href="{{ url('/login') }}">Login</a></li>
    </ul>
</nav>

<!-- Welcome Section -->
<div class="welcome-section">
    <h1>Welcome to Laravel E-Commerce</h1>
    <p>Your one-stop shop for the best products</p>
    <a href="{{ url('/shop') }}" class="btn">Shop Now</a>
</div>

<!-- Featured Products Section -->
<div class="featured-products">
    <h2>Featured Products</h2>
    <div class="product-grid">
        @foreach($products as $product)
        <div class="product-card">
        <img src="{{ asset('products/'.$product->image) }}" alt="{{ $product->title }}">
        <h3>{{ $product->title }}</h3>
            <p>{{ $product->description }}</p>
            <p class="price">${{ $product->price }}</p>
            <a href="{{ url('/product/'.$product->id) }}" class="btn">View Product</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
