@extends('layouts.app')

@section('title', $product->title)

@section('css')
<link rel="stylesheet" href="{{ asset('css/product_view.css') }}">
@endsection

@section('content')

<div class="product-view">
<img src="{{ asset('products/'.$product->image) }}" alt="{{ $product->title }}">
    <h2>{{ $product->title }}</h2>
    <p>{{ $product->description }}</p>
    <p>Price: ${{ $product->price }}</p>
    <form action="#" method="POST">
        @csrf
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" min="1" max="10" value="1">
        <label for="payment">Payment Option:</label>
        <select name="payment">
            <option value="esewa">eSewa</option>
            <option value="khalti">Khalti</option>
            <option value="cash_on_delivery">Cash on Delivery</option>
        </select>
        <button type="submit" class="btn">Buy Now</button>
    </form>
</div>
@endsection
