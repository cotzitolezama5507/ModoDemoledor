<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    public function index()
    {
    $viewData = [];
    $viewData["title"] = "Home Page - Library Abigail";
    return view('home.index')->with("viewData", $viewData);
    }
    public function about()
    {
        $viewData = [];
        $viewData["title"] = "Informacion de - Confecciones Abigail";
        $viewData["subtitle"] = "Mi información";
        $viewData["description"] = "Esta es una pagina de iformación";
        $viewData["author"] = "Developed by: Your Name";
        return view('home.about')->with("viewData", $viewData);

    }
}