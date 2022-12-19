<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate();

        return response(['status' => true, 'data' => $category], Response::HTTP_OK);
    }
 
    public function show($id)
    {
        $category = Category::find($id);
        if ($category != null) {
            return response()->json(['status' => true, 'data' => $category], Response::HTTP_OK);
        } else {
            return response()->json(['status' => false, 'data' => null], Response::HTTP_NOT_FOUND);
        }
    }
 
    public function store(StoreProductoRequest $request)
    {
        $category = new Category($request->input());

        $category->saveOrFail();

        return response()->json(['status' => true, 'data' => $category], Response::HTTP_OK);
    }
 
    public function update(UpdateProductoRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->fill($request->input())->saveOrFail();
        return response()->json(['status' => true, 'data' => $category], 200);
    }
 
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response()->json(['estado' => true, 'mensajes' => 'Eliminado el '.$id], 200);
    }
}
