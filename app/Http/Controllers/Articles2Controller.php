<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use DB;
use Yajra\Datatables\Facades\Datatables;
use App\Article;

class Articles2Controller extends Controller {
    /*
     * 
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('articles2.index');
    }

    /**
     * Process datatables ajax request.
     */
    public function anyData() {
        //return Datatables::of(\App\Article::query())->make(true);
        
       // $articles = Article::select(['id', 'title', 'body', 'created_at', 'updated_at']);
        
       // return Datatables::of($articles)->editColumn('title', '{{ $title."-title" }}')->make();
        
        
        return Datatables::of(Article::query())->make();
        
    }


}
