<link rel="stylesheet" href="{{ asset('css/admin-forms.css') }}">

@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
<div class="admin-form-wrapper">
    <h2>Add Category</h2>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf

        <div class="admin-form-group">
            <label>Category name</label>
            <input type="text" name="name" required>
        </div>

        <button class="admin-add-btn">
            Create Category
        </button>
    </form>
</div>
@endsection
