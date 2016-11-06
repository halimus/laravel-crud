<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Article;
use Carbon\Carbon;
use Request; // for use formRequest validation
//use Illuminate\Http\Request; // second way, is to validate in the controller
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller {
    /*
     * 
     */

    public function __construct() {
        //$this->middleware('auth', ['only' => 'create']);
        //$this->middleware('auth', ['only' => ['create', 'edit', 'destroy']]);
        //$this->middleware('auth', ['except' => ['index']]);
        $this->middleware('auth');
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
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
//        $article = Article::find($id);
//        if(is_null($article)){
//            abort(404);
//        }
        $article = Article::findOrFail($id);

        //dd($article->published_at);
        //dd($article->created_at);
        // dd($article->created_at->year); // you can do that show only year
        // dd($article->created_at->addDays(8)); // i wanna add 8 days to it
        // dd($article->created_at->addDays(8)->format('Y-m')); // you can also formated
        // dd($article->created_at->addDays(8)->diffForHumans()); // you can also formated fifferent way
        //return $article;
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //return Auth::user();
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Requests\ArticleRequest $request) {

        /*
          $input = Request::all();
          $input['published_at'] = Carbon::now();
          $input['users_id'] = Auth::id();
          Article::create($input);
         */

        $request['users_id'] = Auth::id();
        Article::create($request->all());

        return redirect('articles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $article = Article::findOrFail($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Requests\ArticleRequest $request) {
        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect('articles');
    }

}
