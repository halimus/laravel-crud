<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller {

    public function __construct() {

        //$this->middleware('auth');
        //$this->middleware('auth', ['only' => 'create']);
        //$this->middleware('auth', ['only' => ['create', 'edit', 'destroy']]);
        //$this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        //return \Auth::user();
        //$articles = Article::all();
        //$articles = Article::latest()->get();
        //$articles = Article::oldest()->get();
        //$articles = Article::orderBy('published_at', 'desc')->get(); // you can do this too
        //$articles = Article::latest('published_at')->where('published_at', '<=', Carbon::now())->get();  // not give the articles that published in the future
        //$articles = Article::latest('published_at')->published()->get();
        //return $articles;
        //return view('articles.index', compact('articles'));
        return view('articles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        //return Auth::user();
        //return $article;
        return view('articles.create');
    }
    
    

}
