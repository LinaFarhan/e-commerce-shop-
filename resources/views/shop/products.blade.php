@extends('layouts.app')

@section('title', 'Products')
 

@section('content')
  <h1 class="mb-4">Products</h1>

  {{-- Show "no products" with @unless as required --}}
  @unless(count($products))
    <div class="alert alert-warning">No products currently available.</div>
  @endunless

  {{-- List products with Blade loop helpers --}}
  @foreach ($products as $product)
    <div class="card mb-3 p-3 {{ $loop->first ? 'border-primary' : '' }}">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <div class="small text-muted"># {{ $loop->index + 1 }}</div>
          <h5 class="mb-1">{{ $product['name'] }}</h5>
          <p class="mb-2">{{ $product['description'] }}</p>
          <p class="mb-0">Price: ${{ number_format($product['price'], 2) }}</p>
        </div>

        <div class="text-end">
          @if($product['on_sale'])
            <span class="badge text-bg-success">Sale</span>
          @else
            <span class="badge text-bg-secondary">Regular</span>
          @endif
          <div class="mt-2">
            <a class="btn btn-outline-primary btn-sm"
               href="{{ route('shop.productDetails', $product['id']) }}">
              View Details
            </a>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  {{-- Alternative empty-state using @forelse (optional demo) --}}
  @forelse ($products as $p)
    @if(false) {{-- purely to demonstrate @forelse structure without duplicating output --}}
      <div>{{ $p['name'] }}</div>
    @endif
  @empty
    <div class="alert alert-warning">No products currently available.</div>
  @endforelse
@endsection