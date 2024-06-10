@extends('layouts.mainlayout')
@section('title', 'Edit Product')
@section('content')
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Edit Product</h3>
                        <form action="{{route('product.update', ['product' => $product])}}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="productname" id="productname" placeholder="Product Name" value="{{$product->productname}}">
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="category" id="category" placeholder="Category" value="{{$product->category}}">
                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="number" step="0.01" name="price" id="price" placeholder="Price" value="{{$product->price}}">
                            <div class="form-button mt-3">
                                <button id="submit" type="submit" value="edit" class="btn btn-primary">Edit Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const input = document.querySelector('#price')
        input.addEventListener('change', e => {
            e.currentTarget.value = parseFloat(e.currentTarget.value).toFixed(2)    
        })
    </script>
@endsection