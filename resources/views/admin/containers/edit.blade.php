<link rel="stylesheet" href="{{ asset('css/admin-forms.css') }}">

@extends('layouts.app')

@section('title', 'Edit Container')

@section('content')
<div class="admin-form-wrapper">
    <h2>Edit Container</h2>

    <form method="POST"
          action="{{ route('containers.update', $container) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="admin-form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $container->name }}" required>
        </div>

        <div class="admin-form-group">
            <label>Price</label>
            <input type="number" step="0.01" name="price" value="{{ $container->price }}" required>
        </div>

        {{-- Imagen actual --}}
        @if($container->image)
            <div class="admin-form-preview">
                <img src="{{ $container->image }}">
            </div>
        @endif

        <div class="admin-form-group">
            <label>Change image</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <div class="admin-form-group">
            <label>Description</label>
            <textarea name="description" required>{{ $container->description }}</textarea>
        </div>

        <div class="admin-form-group">
            <label>Type</label>
            <select name="type" required>
                <option value="vivienda" @selected($container->type === 'vivienda')>Vivienda</option>
                <option value="oficina" @selected($container->type === 'oficina')>Oficina</option>
                <option value="almacen" @selected($container->type === 'almacen')>Almacén</option>
                <option value="otro" @selected($container->type === 'otro')>Otro</option>
            </select>
        </div>

        <div class="admin-form-group">
            <label>Category</label>
            <select name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected($container->category_id === $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="admin-add-btn">
            Save changes
        </button>
        
    </form>
    <form method="POST"
      action="{{ route('containers.destroy', $container) }}"
      onsubmit="return confirm('Are you sure you want to delete this container?');"
      style="margin-top:20px;">

    @csrf
    @method('DELETE')

    <button type="submit" class="admin-delete-btn">
        Delete container
    </button>
</form>
</div>
@endsection
