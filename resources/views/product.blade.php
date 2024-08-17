@extends('layouts.app')

@section('title', 'Products')

@section('css')
<link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('content')
<div class="container">
    <main class="col-md-12">
        <h1>Our Products</h1>

        <div class="product-grid">
            @foreach($products as $product)
            <div class="product-card">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                <div class="product-info">
                    <h3>{{ $product->title }}</h3>
                    <p>{{ Str::limit($product->description, 100) }}</p>
                    <p class="price">${{ $product->price }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</div>
@endsection
