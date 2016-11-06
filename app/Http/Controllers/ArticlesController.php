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
        
        return view('articles.index', compact('articles'));
        
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

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    /*
     *  We can store the data with 2 different ways,
     *  teh first way, we dont create formRequest class, so we validate directly in the controller, so
     *  we use Illuminate\Http\Request
     * the second one, we use formRequest to validate use Request
     */
    public function store0(Request $request) {

        $this->validate($request, ['title' => 'required|min:3', 'body' => 'required', 'published_at' => 'required|date']);

        //Article::create(Request::all());
        Article::create($request->all());

        return redirect('articles');
    }

    public function store(Requests\ArticleRequest $request) {

        //$input = Request::all();
        //return $input;
        //$input['published_at'] = Carbon::now();
        //validation
        //Article::create(Request::all());
        //$request = $request->all();
        //$request['user_id'] = Auth::id();
        //Article::create($request->all());
        // we can do also
        $article = new Article($request->all());
        Auth::user()->articles()->save($article);

        return redirect('articles');
    }

}
