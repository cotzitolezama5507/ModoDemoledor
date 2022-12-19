<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Book - Library Abigail";
        $viewData["subtitle"] = "List from Library";
        $viewData["loan"] = Loan::where('user_id', Auth::user()->getId())->get();
        

        Loan::validate($request);
        $newProduct = new Loan();

        $newProduct->setIdBook($request->input('book_id'));
        $newProduct->setIdUser($request->input('user_id'));
        
        $newProduct->save();
    
        return view('loan.index')->with("viewData", $viewData);
    }
    

}
