<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Subcategories;
use App\Models\Categories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $subcats = Subcategories::with('category')->get()->groupBy('category_id');

        $data = compact("subcats");
        return view("index", $data);
    }
}
