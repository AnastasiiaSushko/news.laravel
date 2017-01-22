<?php
namespace App\Http\Controllers;

use App\Category;
use DB;

use Illuminate\Http\Request;




class CategoryController extends Controller
{
    public function index( $id)
    {

        $category = Category::find($id);

        $articles = $category->articles()->orderBy('id', 'desc')->paginate(5);

        return view('category',['articles'=>$articles, 'category'=>$category]);
    }

}
