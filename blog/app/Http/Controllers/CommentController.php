<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;


class CommentController extends Controller
{
    public function add_comment($id, Request $request){

        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->input('comment');;

        $comment->save();
        return redirect('/article/' . $id);




    }
}
