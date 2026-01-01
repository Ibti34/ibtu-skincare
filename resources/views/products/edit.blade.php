@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Product</h2>

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
        action="{{ route('products.update', $product->id) }}" 
        method="POST" 
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        {{-- Product Name --}}
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input 
                type="text" 
                name="name" 
                value="{{ $product->name }}"
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
                value="{{ $product->price }}"
                step="0.01"
                class="form-control"
                required
            >
        </div>

        {{-- Current Main Image --}}
        <div class="mb-3">
            <label class="form-label">Current Main Image</label><br>
            <img 
                src="{{ asset('storage/'.$product->image) }}" 
                style="width:150px; border-radius:8px;"
            >
        </div>

        {{-- Replace Main Image --}}
        <div class="mb-3">
            <label class="form-label">Change Main Image</label>
            <input 
                type="file" 
                name="image" 
                class="form-control"
            >
        </div>

        {{-- Existing Additional Images --}}
        @if($product->images->count())
            <div class="mb-3">
                <label class="form-label">Additional Images</label>
                <div style="display:flex; gap:10px; flex-wrap:wrap;">
                    @foreach($product->images as $img)
                        <img 
                            src="{{ asset('storage/'.$img->image) }}" 
                            style="width:80px; height:80px; object-fit:cover; border-radius:6px;"
                        >
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Add More Images --}}
        <div class="mb-3">
            <label class="form-label">Add More Images</label>
            <input 
                type="file" 
                name="images[]" 
                multiple
                class="form-control"
            >
        </div>

        <button type="submit" class="btn btn-success">
            Update Product
        </button>
    </form>
</div>
@endsection
