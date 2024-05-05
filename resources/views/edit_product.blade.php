@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Product') }}</div>

                    <div class="card-body">
                        <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control"
                                    value="{{ $product->name }}">
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control"
                                    value="{{ $product->price }}">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" placeholder="Description" class="form-control"
                                    value="{{ $product->description }}">
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="stock" placeholder="Stock" class="form-control"
                                    value="{{ $product->stock }}">
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-1">Submit data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }}</title>
</head>

<body>
    <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <label for="">Name</label>
        <br>
        <input type="text" name="name" value="{{ $product->name }}">
        <br>
        <label for="">price</label>
        <br>
        <input type="text" name="price" value="{{ $product->price }}">
        <br>
        <label for="">descripsi</label>
        <br>
        <input type="text" name="description" value="{{ $product->description }}">
        <br>
        <label for="file"></label>
        <br>
        <input type="file" name="image">
        <br>
        <label for="">stock</label>
        <br>
        <input type="text" name="stock" value="{{ $product->stock }}">
        <br>
        <button type="submit">Edit</button>
    </form>
    <form action="{{ route('index_product') }}" method="get"><button type="submit">Kembali</button></form>
</body>

</html> --}}
