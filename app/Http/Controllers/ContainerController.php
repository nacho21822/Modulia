<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Container;
use App\Models\Category;

class ContainerController extends Controller
{
    public function index(Request $request)
    {
        $query = Container::with('category');

        if ($request->search) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        if ($request->category && $request->category != 'all') {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('name', $request->category);
            });
        }

        if ($request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        $containers = $query->get();

        if ($request->ajax()) {
            return view('partials.products_list', compact('containers'))->render();
        }

        $categories = Category::all();
        return view('products', compact('categories', 'containers'));
    }
}