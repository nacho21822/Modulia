@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
  <div style="max-width: 400px; margin: 80px auto;">
    <h2>Add Category</h2>

    <form method="POST" action="{{ route('categories.store') }}">
      @csrf

      <div style="margin-bottom: 16px;">
        <input
          type="text"
          name="name"
          placeholder="Category name"
          required
          style="width:100%; padding:10px;"
        >
      </div>

      <button type="submit" class="admin-add-btn">
        Save
      </button>
    </form>
  </div>
@endsection
