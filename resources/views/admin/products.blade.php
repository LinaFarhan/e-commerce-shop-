@extends('layouts.app')

@section('content')
<h1>Products</h1>
<table>
    <tr>
        <th>Name</th><th>Price</th><th>Category</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->name }}</td>
        <td>${{ $product->price }}</td>
        <td>{{ $product->category->name }}</td>
         <td>
            @can('update', $product)
                <button>Edit Product</button>
            @endcan
        </td>
    </tr>
    @endforeach
</table>
@endsection
@can('update', $product)
    <button>Edit Product</button>
@endcan
