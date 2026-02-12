@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Create Product</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                value="{{ old('name') }}"
                required
            >
        </div>

        {{-- Product Price --}}
        <div class="mb-3">
            <label class="form-label">Price (ETB)</label>
            <input 
                type="number" 
                name="price" 
                step="0.01"
                class="form-control"
                value="{{ old('price') }}"
                required
            >
        </div>

        {{-- Product Description --}}
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea 
                name="description" 
                class="form-control"
                rows="4"
            >{{ old('description') }}</textarea>
        </div>

        {{-- Main Image --}}
        <div class="mb-3">
            <label class="form-label">Main Image</label>
            <input 
                type="file" 
                name="image" 
                class="form-control"
                accept="image/*"
                required
            >
        </div>

        <button type="submit" class="btn btn-primary">
            Save Product
        </button>

        <a href="{{ route('products.index') }}" class="btn btn-secondary ms-2">
            Cancel
        </a>

    </form>
</div>
@endsection
