@extends('layouts.app')

@section('title', 'Add Container')

@section('content')
<div style="max-width:600px;margin:80px auto;">
  <h2>Add Container</h2>

  <form method="POST" action="{{ route('containers.store') }}">
    @csrf

    <input name="name" placeholder="Name" required>
    <input name="price" placeholder="Price" required>
    <textarea
    name="description"
    placeholder="Description"
    required
    style="width:100%; padding:10px; min-height:100px; margin-bottom:12px;"
></textarea>

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
        <option value="{{ $category->id }}">{{ $category->name }}</option>
      @endforeach
    </select>

    <button class="admin-add-btn">Create</button>
  </form>
</div>
@endsection
