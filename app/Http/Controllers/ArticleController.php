<?php

namespace App\Http\Controllers;
use App\Article;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Article Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function index()
    {
        $articles       = \App\Article::get();
        return view('about', compact('articles'));
    }
    public function show($id)
    {
        $article=Article::find($id);
        return view('articles.show',['article'=>$article]);
    }
}

