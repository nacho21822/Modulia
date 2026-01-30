<?php

namespace App\Http\Controllers;

use App\Models\Container;
use App\Models\Category;

class ContainerController extends Controller
{
    public function index()
    {
        $categories = Category::with('containers')->get();

        return view('products', compact('categories'));
    }
}
