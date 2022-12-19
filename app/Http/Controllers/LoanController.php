<?php
namespace App\Http\Controllers;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Book - Library Abigail";
        $viewData["subtitle"] = "List from Library";
        $viewData["loan"] = Loan::where('user_id', Auth::user()->getId())->get();
        return view('loan.index')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        Loan::validate($request);
        $newProduct = new Loan();
        $newProduct->setIdBook($request->input('book_id'));
        $newProduct->save();
    
        return back();

    }

}
