<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'type'        => 'required|in:vivienda,oficina,almacen,otro',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'name',
            'description',
            'price',
            'type',
            'category_id',
            'stock',
        ]);

        if ($request->hasFile('image')) {
            $path = Storage::disk('supabase')->putFile(
                'containers',
                $request->file('image'),
                ['visibility' => 'public']
            );

            $data['image'] =
                'https://' . env('SUPABASE_PROJECT_ID') .
                '.supabase.co/storage/v1/object/public/' .
                env('AWS_BUCKET') . '/' . $path;
        }

        Container::create($data);

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
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'type'        => 'required|in:vivienda,oficina,almacen,otro',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'name',
            'description',
            'price',
            'type',
            'category_id',
            'stock',
        ]);

        if ($request->hasFile('image')) {
            $path = Storage::disk('supabase')->putFile(
                'containers',
                $request->file('image'),
                ['visibility' => 'public']
            );

            $data['image'] =
                'https://' . env('SUPABASE_PROJECT_ID') .
                '.supabase.co/storage/v1/object/public/' .
                env('AWS_BUCKET') . '/' . $path;
        }

        $container->update($data);

        return redirect()->route('products.index');
    }

    public function destroy(Container $container)
    {
        $container->delete();
        return redirect()->route('products.index');
    }
}
