<?php
namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Página Administrador - Category - Library Abigail";
        $viewData["category"] = Category::all();
        return view('admin.category.index')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        Category::validate($request);
        $newProduct = new Category();
        $newProduct->setCategory($request->input('category'));
        $newProduct->save();
    
        return back();
    }
    public function delete($id)
    {
        Category::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Category - Library Store";
        $viewData["category"] = Category::findOrFail($id);
        return view('admin.category.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        Category::validate($request);
        $category = Category::findOrFail($id);
        $category->setCategory($request->input('category'));
        $category->save();
        return redirect()->route('admin.category.index');
    }
}