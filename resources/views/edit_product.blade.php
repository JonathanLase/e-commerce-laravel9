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
                                <label>Description</label>
                                <input type="text" name="description" placeholder="Description" class="form-control"
                                    value="{{ $product->description }}">
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control"
                                    value={{ $product->price }}>
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="stock" placeholder="Stock" class="form-control"
                                    value={{ $product->stock }}>
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Submit data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- <body>
    <form action="{{ route('update_product', $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $product->name }}"><br>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="{{ $product->price }}"><br>
        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" value="{{ $product->stock }}"><br>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="{{ $product->description }}"><br>
        <label for="image">Image</label>
        <input type="file" name="image" id="image" value="{{ $product->image }}">
        <button type="submit">Update Data</button>
    </form>
</body> --}}
