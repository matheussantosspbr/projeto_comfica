<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
USE App\Models\Books;

class HomeController extends Controller
{

    public function __construct()
    {}

    public function index(){
        return view('home');
    }

    public function addBook(Request $request){
        return 'oi';
        return Books::addBook($request);
    }
}