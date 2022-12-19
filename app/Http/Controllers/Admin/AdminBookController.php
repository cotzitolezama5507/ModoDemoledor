<?php
namespace App\Http\Controllers\Admin;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBookController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Página Administrador - Book - Library Abigail";
        $viewData["book"] = Book::all();
        return view('admin.book.index')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        Book::validate($request);
        $newProduct = new Book();
        $newProduct->setNameBook($request->input('namebook'));
        $newProduct->setPages($request->input('pages'));
        $newProduct->setCategory_id($request->input('category_id'));
        $newProduct->setImage("ruby.jpeg");
        $newProduct->save();
        if ($request->hasFile('image')) {
            $imageName = $newProduct->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }
            
        return back();
    }
    public function delete($id)
    {
        Book::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Book - Library Store";
        $viewData["book"] = Book::findOrFail($id);
        return view('admin.book.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        Book::validate($request);
        $book = Book::findOrFail($id);
        $book->setNameBook($request->input('namebook'));
        $book->setPages($request->input('pages'));
        $book->getCategory_id($request->input('category_id'));
        if ($request->hasFile('image')) {
            $imageName = $book->getId().".".$request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $book->setImage($imageName);
        }
        $book->save();
        return redirect()->route('admin.book.index');
    }
}