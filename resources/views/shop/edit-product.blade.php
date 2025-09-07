@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
  <h1 class="mb-4">Edit Product</h1>

  <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Name</label>
      <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
    </div>

    <div class="mb-3">
      <label class="form-label">Price</label>
      <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price', $product->price) }}" required>
    </div>

    <div class="mb-3 form-check">
      <input type="checkbox" name="on_sale" class="form-check-input" {{ $product->on_sale ? 'checked' : '' }}>
      <label class="form-check-label">On Sale</label>
    </div>

    <div class="mb-3">
      <label class="form-label">Product Image</label>
      <input type="file" name="image" class="form-control">
      @if($product->image)
        <p class="mt-2">Current: <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="120"></p>
      @endif
    </div>

    <button type="submit" class="btn btn-success">Update Product</button>
    <a href="{{ route('shop.products')}}" class="btn btn-secondary">Cancel</a>
  </form>
@endsection
