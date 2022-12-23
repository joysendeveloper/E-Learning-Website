<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategories;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategories::all();
        $categories = Categories::all();
        $innerJoin = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('subcategories.*', 'categories.cate_name')
            ->get();

        $data = compact("subcategories", "categories", "innerJoin");

        return view("admin.addcate", $data);
    }
    public function store(Request $req)
    {
        $subcategory = new Subcategories();
        $subcategory->sub_cate_name = $req["subcategory"];
        $subcategory->category_id = $req["main_category"];
        $subcategory->save();

        return redirect("/admin/showcate");
    }
    public function delete($id)
    {
        Subcategories::find($id)->delete();
        return redirect("/admin/addcate");
    }
    public function update($id)
    {
        $subcategory = Subcategories::find($id);
        $categories = Categories::all();
        $data = compact("subcategory", "categories");

        return view("admin.updatesubcate", $data);
    }
    public function edit($id, Request $req)
    {
        $subcategory = Subcategories::find($id);
        $subcategory->sub_cate_name = $req["subcategory"];
        $subcategory->category_id = $req["main_category"];
        $subcategory->save();

        return redirect("/admin/showcate");
    }
}
