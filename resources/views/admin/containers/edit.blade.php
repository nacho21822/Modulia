@extends('layouts.app')

@section('title', 'Edit Container')

@section('content')
<div style="max-width:600px;margin:80px auto;">
  <h2>Edit Container</h2>

  <form method="POST" action="{{ route('containers.update', $container) }}">
    @csrf
    @method('PUT')

    <input name="name" value="{{ $container->name }}" required>
    <input name="price" value="{{ $container->price }}" required>
    <textarea
    name="description"
    required
    style="width:100%; padding:10px; min-height:100px; margin-bottom:12px;"
>{{ $container->description }}</textarea>

    <select name="type" required>
    <option value="vivienda" @selected(isset($container) && $container->type === 'vivienda')>
        Vivienda
    </option>
    <option value="oficina" @selected(isset($container) && $container->type === 'oficina')>
        Oficina
    </option>
    <option value="almacen" @selected(isset($container) && $container->type === 'almacen')>
        Almacén
    </option>
    <option value="otro" @selected(isset($container) && $container->type === 'otro')>
        Otro
    </option>
</select>



    <select name="category_id">
      @foreach ($categories as $category)
        <option value="{{ $category->id }}"
          @selected($container->category_id === $category->id)>
          {{ $category->name }}
        </option>
      @endforeach
    </select>

    <button class="admin-add-btn">Save changes</button>
  </form>
</div>
@endsection
