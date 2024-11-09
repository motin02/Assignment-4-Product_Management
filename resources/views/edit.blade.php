@extends('layouts.app')

@section('content')

<div class="justify-content-center d-flex">
        <div class="col-md-3"></div>

        <div class="border border-primary rounded col-md-6 p-3 mb-3">
            <div class="container mt-3">
                <div class="row justify-content-center w-40">
                    <h2 class="text-center">Edit Product</h2>
                  <form action="{{route('products.update',['id' => $product->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 mt-3">
                      <label for="product_id" class="form-label">Product Id:</label>
                      <input type="text" class="form-control" id="product_id" placeholder="Enter Product Id" name="product_id" value="{{$product->product_id}}">

                      @error('product_id')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="name" class="form-label">Product Name:</label>
                      <input type="name" class="form-control" id="name" placeholder="Enter Product Name" name="name" value="{{$product->name}}">
                      @error('name')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="2" cols="100">{{ $product->description }}</textarea>
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="price" class="form-label">Price:</label>
                      <input type="number" class="form-control" id="price" placeholder="Enter Product Price" name="price" value="{{$product->price}}">
                      @error('price')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    <div class="mb-3 mt-3">
                      <label for="stock" class="form-label">Stock:</label>
                      <input type="number" class="form-control" id="stock" placeholder="Enter Product stock" name="stock" value="{{$product->stock}}">
                      <label for="image" class="form-label">Image:</label>
                      <input type="file" accept="image/png, image/jpeg,image/jpg" class="form-control" id="image" placeholder="Enter Product image" name="image">

                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-primary" onclick="window.history.back()" >Back</button>
                    </div>
                  </form>
                </div>

            </div>
        </div>
        <div class="col-md-3"></div>
</div>

@endsection
