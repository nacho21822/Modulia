<link rel="stylesheet" href="{{ asset('css/admin-forms.css') }}">

@extends('layouts.app')

@section('title', 'Add Container')

@section('content')
<div class="admin-form-wrapper">
    <h2>Add Container</h2>

    <form method="POST"
          action="{{ route('containers.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="admin-form-group">
            <label>Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="admin-form-group">
            <label>Price</label>
            <input type="number" step="0.01" name="price" required>
        </div>

        <div class="admin-form-group">
            <label>Image</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <div class="admin-form-group">
            <label>Description</label>
            <textarea name="description" required></textarea>
        </div>

        <div class="admin-form-group">
            <label>Type</label>
            <select name="type" required>
                <option value="vivienda">Vivienda</option>
                <option value="oficina">Oficina</option>
                <option value="almacen">Almacén</option>
                <option value="otro">Otro</option>
            </select>
        </div>

        <div class="admin-form-group">
            <label>Category</label>
            <select name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="admin-add-btn">
            Create Container
        </button>
    </form>
</div>
@endsection
