@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Create Product</h2>

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form 
        action="{{ route('products.store') }}" 
        method="POST" 
        enctype="multipart/form-data"
    >
        @csrf

        {{-- Product Name --}}
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input 
                type="text" 
                name="name" 
                class="form-control"
                required
            >
        </div>

        {{-- Product Price --}}
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input 
                type="number" 
                name="price" 
                step="0.01"
                class="form-control"
                required
            >
        </div>

        {{-- Main Image --}}
        <div class="mb-3">
            <label class="form-label">Main Image</label>
            <input 
                type="file" 
                name="image" 
                class="form-control"
                required
            >
        </div>

        {{-- Additional Images --}}
        <div class="mb-3">
            <label class="form-label">Additional Images</label>
            <input 
                type="file" 
                name="images[]" 
                multiple
                class="form-control"
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Save Product
        </button>
    </form>
</div>
@endsection
