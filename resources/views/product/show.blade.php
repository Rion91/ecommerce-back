@extends('layout.master')

@section('content')
    <div class="d-flex justify-content-end">
        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"> Back</a>
    </div>

    <h3>
        Show product details
    </h3>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $product->description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Product image</strong>
                <img src="{{asset('images/'.$product->image)}}" class="img-ratio" style="width: 100px;height: 100px">
            </div>
        </div>
    </div>
@endsection
