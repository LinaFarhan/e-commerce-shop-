@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
  <h1>Your Cart</h1>
  <table class="table">
    <thead>
      <tr><th>Product</th><th>Qty</th><th>Price</th><th>Total</th></tr>
    </thead>
    <tbody>
      {{-- Dummy static row for now --}}
      <tr>
        <td>Classic Sneakers</td>
        <td>1</td>
        <td>$49.99</td>
        <td>$49.99</td>
      </tr>
    </tbody>
  </table>
  <div class="text-end">
    <button class="btn btn-success">Checkout</button>
  </div>
@endsection