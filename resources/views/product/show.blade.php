@extends('layouts.app')

@section('title', $product->title)

@section('css')
<link rel="stylesheet" href="{{ asset('css/product_view.css') }}">
@endsection

@section('content')

<div class="product-view">
    <div class="product-image">
        <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}">
    </div>
    <div class="product-details">
        <h2>{{ $product->title }}</h2>
        <p>{{ $product->description }}</p>
        <p class="price">Price: ${{ $product->price }}</p>
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" name="quantity" min="1" max="10" value="1" id="quantity">
            </div>
            <div class="form-group">
                <label for="payment">Payment Option:</label>
                <select name="payment" id="payment">
                    <option value="esewa">eSewa</option>
                    <option value="khalti">Khalti</option>
                    <option value="cash_on_delivery">Cash on Delivery</option>
                </select>
            </div>
            <button type="submit" class="btn">Buy Now</button>
        </form>
    </div>
</div>
@endsection
