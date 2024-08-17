@extends('layouts.app')

@section('title', 'Welcome to Timalya')

@section('css')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')

<div class="welcome-section">
    <img src="{{ asset('image/banner.svg') }}" alt="Banner" class="banner-image">
   
</div>


<!-- Featured Products Section -->
<div class="featured-products">
    <!-- <h2 >Featured Products</h2> -->
    <div class="product-grid">
        @foreach($products as $product)
        <div class="product-card">
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}">
            <h3>{{ $product->title }}</h3>
            <p>{{ $product->description }}</p>
            <p class="price">${{ $product->price }}</p>
            <a href="{{ route('admin.products.show', $product->id) }}" class="btn">View Product</a>
            </div>
        @endforeach
    </div>
</div>
@include('team')

@endsection
