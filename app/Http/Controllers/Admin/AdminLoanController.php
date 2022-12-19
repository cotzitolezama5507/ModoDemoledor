<?php
namespace App\Http\Controllers\Admin;
use App\Models\Loan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLoanController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Página Administrador - Loan - Library Abigail";
        $viewData["loan"] = Loan::all();
        return view('admin.loan.index')->with("viewData", $viewData);
    }
    public function store(Request $request)
    {
        Loan::validate($request);
        $newProduct = new Loan();
        $newProduct->setIdBook($request->input('book_id'));
        $newProduct->setIdUser($request->input('user_id'));
        
        $newProduct->save();
    
        return back();
    }
    public function delete($id)
    {
        Loan::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Page - Edit Loan - Library Store";
        $viewData["loan"] = Loan::findOrFail($id);
        return view('admin.loan.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        Loan::validate($request);
        $category = Loan::findOrFail($id);
        $category->setIdBook($request->input('book_id'));
        $category->setIdUser($request->input('user_id'));
        $category->save();
        return redirect()->route('admin.loan.index');
    }
}