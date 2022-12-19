<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Library - Library Abigail";
        $viewData["subtitle"] = "List Books";
        $viewData["book"] = Book::all();
        return view('book.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $viewData = [];
        $book = Book::findOrFail($id);
        $viewData["title"] = $book->getNameBook()." - Library Abigail ";
        $viewData["subtitle"] = $book->getNameBook()." - About ";
        $viewData["book"] = $book;
        return view('book.show')->with("viewData", $viewData);
    }
}
