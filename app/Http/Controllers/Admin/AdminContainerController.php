<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminContainerController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.containers.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
    'name' => 'required|string|max:255',
    'description' => 'required|string',
    'price' => 'required|numeric',
    'type' => 'required|in:vivienda,oficina,almacen,otro',
    'category_id' => 'required|exists:categories,id',
]);


        Container::create($request->all());

        return redirect()->route('products.index');
    }

    public function edit(Container $container)
    {
        $categories = Category::all();
        return view('admin.containers.edit', compact('container', 'categories'));
    }

    public function update(Request $request, Container $container)
    {
        $request->validate([
    'name' => 'required|string|max:255',
    'description' => 'required|string',
    'price' => 'required|numeric',
    'type' => 'required|in:vivienda,oficina,almacen,otro',
    'category_id' => 'required|exists:categories,id',
]);


        $container->update(
        $request->only([
        'name',
        'price',
        'type',
        'category_id',
        'image',
        'description',
        'stock',
    ])
);
        return redirect()->route('products.index');
    }
}
