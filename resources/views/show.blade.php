@extends('layouts.app')

@section('content')

<div class="container py-5">
    <div class="row">
      <div class="col-md-6">
        <!-- Product Image -->
        <div class="card">
          <img src="{{ asset('storage/'.$product->image) }}" class="card-img-top" alt="Product Image">
        </div>
      </div>
      <div class="col-md-6">
        <!-- Product Details -->
        <h2 class="display-4">{{$product->name}}</h2>
        <p class="text-muted">Stock: {{$product->stock}}</p>
        <p class="text-muted">Product Id: {{$product->product_id}}</p>
        <p class="fs-4 text-success">Price: ${{$product->price}}</p>
        <p class="lead">Description: {{$product->description}}</p>

        <!-- Add to Cart Button -->
        <div class="d-grid gap-2">
          <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-warning btn-sm">Edit</a>

        </div>
      </div>
    </div>
  </div>


@endsection
