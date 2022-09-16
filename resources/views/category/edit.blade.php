@extends('layout.master')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-primary">Back</a>
    </div>
    <div class="">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group mb-2">
                <label>Enter category name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
            </div>
            <input type="submit" value="Update" class="btn btn-sm btn-success">

        </form>
    </div>
@endsection
