@extends('layout.master')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('categories.create') }}" class="btn btn-sm btn-success">Create</a>
    </div>

    <div class="table-responsive">
        <table class="table table-light table-striped">
            <thead>
            <tr>
                <th>ID.</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>

                        <button class="btn btn-sm btn-danger"
                                onclick="openSwal({{$category->id}})">
                            Delete
                        </button>

                        <form
                            action="{{ route('categories.destroy', $category->id) }}"
                            id="delete-form-{{$category->id}}"
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
        {{ $categories->links() }}

    </div>

@endsection
