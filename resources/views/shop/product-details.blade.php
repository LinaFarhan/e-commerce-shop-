@extends('layouts.app')

@section('title', $product['name'] . ' - Details')

@section('content')
  <a href="{{ route('shop.products') }}" class="btn btn-link">&larr; Back to products</a>

  <div class="card p-4">
    <h2 class="mb-2">{{ $product['name'] }}</h2>
    <p class="mb-1">Price: ${{ number_format($product['price'], 2) }}</p>
    @if($product['on_sale'])
      <p><span class="badge text-bg-success">On Sale</span></p>
    @endif
    <p class="mt-3">{{ $product['description'] }}</p>
    <button class="btn btn-primary">Add to Cart</button>
  </div>
@endsection