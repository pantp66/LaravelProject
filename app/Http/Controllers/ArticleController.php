<?php

namespace App\Http\Controllers;
use App\Article;
use App\Tag;
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
        if(request('tag')){

            $articles=Tag::where('name',request('tag'))->firstorfail()->articles;
        }
        else
        {
            $articles = Article::latest()->get();

        }
         
        //Render a list of a resource
        return view('articles.index', ['articles'=>$articles]);
    }
    public function show(Article $article)
    {
        //show a single resource
        return view('articles.show',['article'=>$article]);
    }
    public function create(){

  //shows a view to create a new resource
      return view('articles.create',[
       'tags'=>tag::all()

      ]);
    }
    public function store(){
        
        $this->validateArticle();
        $article= new Article(request(['title','excerpt','body']));
        $article->user_id=2;
        $article->save();

        $article->tags()->attach(request('tags'));
      /*  Article::create(request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required' 
        ]));

       $validatedAttribute = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'

        ]);
        return $validatedAttribute;
        Article::create($validatedAttribute);  //---we can use this in place of below
        //dump(request()->all());  ---Json Format
      
        Article::create([
            'title'=>request('title'),
            'excerpt' => request('excerpt'),
            'body' => request('body')
 
        ]); */
        return redirect (route('articles.index'));
    }
    public function edit(Article $article){
    // shows a view to edit an existing resouce
         return view('articles.edit',compact('article'));

    }
    public function update(Article $article){

        
        Article::update(request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required' 
        ]));
        return redirect('/articles/'. $article->id);
  
    }
    public function destroy(){
    //delete the resource

    }
    protected function validateArticle(){
         return request()->validate([
        'title' => 'required',
        'excerpt' => 'required',
        'body' => 'required' ,
        'tag' =>'exists:tags,id'
         ]);
    }
}

