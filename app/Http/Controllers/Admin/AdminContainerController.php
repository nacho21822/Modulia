<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Container;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class AdminContainerController extends Controller
{
    /**
     * Display form to create a new container.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.containers.create', compact('categories'));
    }

    /**
     * Store a new container in the database.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateContainerRequest($request);

        // Upload image if provided
        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->uploadImageToSupabase($request->file('image'));
        }

        Container::create($validatedData);

        return redirect()->route('products.index')
            ->with('success', 'Container created successfully!');
    }

    /**
     * Display form to edit an existing container.
     */
    public function edit(Container $container)
    {
        $categories = Category::all();
        return view('admin.containers.edit', compact('container', 'categories'));
    }

    /**
     * Update an existing container in the database.
     */
    public function update(Request $request, Container $container)
    {
        $validatedData = $this->validateContainerRequest($request);

        // Upload new image only if provided
        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->uploadImageToSupabase($request->file('image'));
        }

        $container->update($validatedData);

        return redirect()->route('products.index')
            ->with('success', 'Container updated successfully!');
    }

    /**
     * Delete a container from the database.
     */
    public function destroy(Container $container)
    {
        $container->delete();

        return redirect()->route('products.index')
            ->with('success', 'Container deleted successfully!');
    }

    // PRIVATE HELPER METHODS
    /**
     * Validate common container form fields.
     * Used in both store() and update() to avoid code duplication.
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
     * Upload image to Supabase Storage via REST API and return the public URL.
     * Uses Laravel HTTP client — no S3 driver or extra packages needed.
     */
    private function uploadImageToSupabase(UploadedFile $imageFile): string
    {
        $filename   = uniqid('img_', true) . '.' . $imageFile->getClientOriginalExtension();
        $supabaseUrl = env('SUPABASE_URL');
        $supabaseKey = env('SUPABASE_KEY');

        Http::withHeaders([
            'Authorization' => 'Bearer ' . $supabaseKey,
            'Content-Type'  => $imageFile->getMimeType(),
            'x-upsert'      => 'true',
        ])->withBody(
            file_get_contents($imageFile->getPathname()),
            $imageFile->getMimeType()
        )->post("{$supabaseUrl}/storage/v1/object/containers/{$filename}");

        return "{$supabaseUrl}/storage/v1/object/public/containers/{$filename}";
    }
}