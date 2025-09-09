@extends('layouts.app')

@section('title', 'Products')

@section('content')
<h1 class="mb-4">Products</h1>

{{-- عرض المنتجات أو رسالة عند عدم وجود أي منتج --}}
@forelse ($products as $product)
  <div class="card mb-3 p-3 {{ $loop->first ? 'border-primary' : '' }}">
    <div class="d-flex justify-content-between align-items-center">
      <div>
        <div class="small text-muted"># {{ $loop->iteration }}</div>
        <h5 class="mb-1">{{ $product->name }}</h5>
        <p class="mb-2">{{ $product->description }}</p>
        <p class="mb-0">Price: ${{ number_format($product->price, 2) }}</p>
      </div>

      <div class="text-end">
        @if($product->on_sale)
          <span class="badge text-bg-success">Sale</span>
        @else
          <span class="badge text-bg-secondary">Regular</span>
        @endif
        <div class="mt-2">
          <a class="btn btn-outline-primary btn-sm"
             href="{{ route('shop.productDetails', $product->id)}}">
            View Details
          </a>
            <a class="btn btn-outline-warning btn-sm"
       href="{{ route('products.edit', $product->id)}}">
       Edit
    </a>
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline"
      onsubmit="return confirm('Are you sure you want to delete this product?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
</form>

        </div>
      </div>
    </div>
  </div>
@empty
  <div class="alert alert-warning">No products currently available.</div>
@endforelse
@endsection
