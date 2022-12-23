<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategories;
use App\Models\Categories;


class CategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategories::all();
        $categories = Categories::all();
        $innerJoin = Subcategories::join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('subcategories.*', 'categories.cate_name')
            ->get();
        $data = compact("categories", "subcategories", "innerJoin");

        return view("admin.addcate", $data);
    }
    public function store(Request $req)
    {
        $category = new Categories();
        $category->cate_name = $req["category"];
        $category->save();

        return redirect("/admin/addcate");
    }
    public function delete($id)
    {
        Categories::find($id)->delete();
        return redirect("/admin/addcate");
    }
    public function update($id)
    {
        $category = Categories::find($id);
        $data = compact("category");

        return view("admin.updatecate", $data);
    }
    public function edit($id, Request $req)
    {
        $category = Categories::find($id);
        $category->cate_name = $req["category"];
        $category->save();

        return redirect("/admin/addcate");
    }
}
