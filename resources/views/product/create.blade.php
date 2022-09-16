@extends('layout.master')

@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">Back</a>
    </div>
    <div class="">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <label>Product name*</label>
                <input type="text" placeholder="Enter product name" class="form-control" name="name"
                       value="{{ old('name') }}">

            </div>

            <div class="form-group mb-2">
                <label>Product description*</label>
                <textarea type="text" class="form-control" name="description"
                          placeholder="Enter product description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group mb-2">
                <label>Product unit price*</label>
                <input type="text" class="form-control" name="unit_price" value="{{ old('unit_price') }}"
                       placeholder="Enter product price">
            </div>

            <div class="form-group mb-2">
                <label>Choose product category*</label>
                <select name="category_id" class="form-select form-select-lg" aria-label=".form-select-lg example">
                    <option selected>Open this select menu</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-2">
                <label>Choose image*</label>
                <input type="file" name="image" class="form-control" onchange="preview(event)">
                <img src="{{ asset('img/image-plus.png') }}" class="form-control" alt="" id="img">
            </div>

            <div class="mt-2">
                <input type="submit" value="Save" class="btn btn-sm btn-success">
            </div>

        </form>
    </div>
@endsection
@push('js')
    <script>
        function preview(event) {
            let input = event.target.files[0];
            let reader = new FileReader();
            reader.onload = function () {
                let result = reader.result;
                let img = document.getElementById('img');
                img.src = result;
            }
            reader.readAsDataURL(input);
        }
    </script>
@endpush
