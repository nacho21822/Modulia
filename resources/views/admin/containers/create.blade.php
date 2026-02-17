@extends('layouts.app')

@section('title', 'Add Container')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/admin-forms.css') }}">
@endpush

@section('content')
<div class="admin-form-wrapper">
    <h2>Add Container</h2>

    <form method="POST"
          action="{{ route('containers.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="admin-form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            @error('name') <span style="color:red;font-size:0.85rem;">{{ $message }}</span> @enderror
        </div>

        <div class="admin-form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" id="price" name="price" value="{{ old('price') }}" required>
            @error('price') <span style="color:red;font-size:0.85rem;">{{ $message }}</span> @enderror
        </div>

        <div class="admin-form-group">
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ old('stock', 0) }}" min="0">
            @error('stock') <span style="color:red;font-size:0.85rem;">{{ $message }}</span> @enderror
        </div>

        <div class="admin-form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" accept="image/*">
            @error('image') <span style="color:red;font-size:0.85rem;">{{ $message }}</span> @enderror
        </div>

        <div class="admin-form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
            @error('description') <span style="color:red;font-size:0.85rem;">{{ $message }}</span> @enderror
        </div>

        <div class="admin-form-group">
            <label for="type">Type</label>
            <select id="type" name="type" required>
                <option value="vivienda"  @selected(old('type') === 'vivienda')>Vivienda</option>
                <option value="oficina"   @selected(old('type') === 'oficina')>Oficina</option>
                <option value="almacen"   @selected(old('type') === 'almacen')>Almacén</option>
                <option value="otro"      @selected(old('type') === 'otro')>Otro</option>
            </select>
            @error('type') <span style="color:red;font-size:0.85rem;">{{ $message }}</span> @enderror
        </div>

        <div class="admin-form-group">
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <span style="color:red;font-size:0.85rem;">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="admin-add-btn">
            Create Container
        </button>
    </form>
</div>
@endsection