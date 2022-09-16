@extends('layout.master')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('products.create') }}" class="btn btn-sm btn-success">Create</a>
    </div>

    <div class="table-responsive">
        <table class="table table-light table-striped">
            <thead>
            <tr>
                <th>ID.</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Unit Price</th>
                <th>Category name</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        <img src="{{ asset('images/'.$product->image) }}" class="img-ratio"
                             style="width: 100px; height: 100px" alt="">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->unit_price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info">Show</a>

                        <button class="btn btn-sm btn-danger"
                                onclick="openSwal({{$product->id}})">
                            Delete
                        </button>

                        <form
                            action="{{ route('products.destroy', $product->id) }}"
                            id="delete-form-{{$product->id}}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
        {{ $products->links() }}
    </div>

@endsection
