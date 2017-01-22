<?php

namespace App\Http\Controllers;
use DB;
use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($id)
    {

        if ($new = Article::find($id)) {
            $new->hits++;
            $new->save();
            return view('article', ['new' => $new]);
        }
        
        return abort(404);
        
    }
}
