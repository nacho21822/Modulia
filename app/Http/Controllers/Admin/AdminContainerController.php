<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AdminContainerController extends Controller
{
    /**
     * Muestra el formulario para crear un nuevo contenedor.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.containers.create', compact('categories'));
    }

    /**
     * Guarda un nuevo contenedor en la base de datos.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateContainerRequest($request);

        // Subir imagen si se ha proporcionado una
        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->uploadImageToSupabase($request->file('image'));
        }

        Container::create($validatedData);

        return redirect()->route('products.index')
            ->with('success', 'Container created successfully!');
    }

    /**
     * Muestra el formulario para editar un contenedor existente.
     */
    public function edit(Container $container)
    {
        $categories = Category::all();
        return view('admin.containers.edit', compact('container', 'categories'));
    }

    /**
     * Actualiza un contenedor existente en la base de datos.
     */
    public function update(Request $request, Container $container)
    {
        $validatedData = $this->validateContainerRequest($request);

        // Subir nueva imagen solo si se ha enviado una nueva
        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->uploadImageToSupabase($request->file('image'));
        }

        $container->update($validatedData);

        return redirect()->route('products.index')
            ->with('success', 'Container updated successfully!');
    }

    /**
     * Elimina un contenedor de la base de datos.
     */
    public function destroy(Container $container)
    {
        $container->delete();

        return redirect()->route('products.index')
            ->with('success', 'Container deleted successfully!');
    }

    // =========================================================
    // MÉTODOS PRIVADOS (helpers internos del controlador)
    // =========================================================

    /**
     * Valida los campos comunes del formulario de contenedor.
     * Se usa tanto en store() como en update() para evitar duplicar código.
     */
    private function validateContainerRequest(Request $request): array
    {
        return $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'type'        => 'required|in:vivienda,oficina,almacen,otro',
            'category_id' => 'required|exists:categories,id',
            'stock'       => 'nullable|integer|min:0',
            'image'       => 'nullable|image|max:2048',
        ]);
    }

    /**
     * Sube un archivo de imagen a Supabase Storage y devuelve la URL pública.
     */
    private function uploadImageToSupabase(UploadedFile $imageFile): string
    {
        $path = Storage::disk('supabase')->putFile(
            'containers',
            $imageFile,
            ['visibility' => 'public']
        );

        return 'https://' . env('SUPABASE_PROJECT_ID') .
               '.supabase.co/storage/v1/object/public/' .
               env('AWS_BUCKET') . '/' . $path;
    }
}