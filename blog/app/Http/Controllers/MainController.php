<?php

namespace App\Http\Controllers;

use App\Category;
use DB;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        //Category - 5 articles
        $categories = Category::all();

        return view('main', ['categories' => $categories]);
    }
}
