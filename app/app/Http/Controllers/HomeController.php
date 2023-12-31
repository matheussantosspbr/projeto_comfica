<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class HomeController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        return view('home', ['books' => Books::all()]);
    }

    public function favoritos(){
        return Books::selectFavorites();
    }

    public function addBook(Request $request)
    {
        return Books::addBook($request);
    }
    
    public function removeBook(Request $request)
    {
        return Books::removeBook($request);
    }

    public function favoriteBook(Request $request)
    {
        return Books::favoriteBook($request);
    }
    
}
