<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Yajra\Datatables;

use DB;
use Yajra\Datatables\Facades\Datatables;

class Articles2Controller extends Controller {
    /*
     * 
     */

    public function __construct() {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * https://datatables.yajrabox.com/starter#migrate-seed
     * https://github.com/yajra/laravel-datatables
     * http://yajra.github.io/laravel-datatables/
     */
    public function index() {
        return view('articles2.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData() {
        //return Datatables::of(\App\Article::query())->make(true);
        
        $articles = \App\Article::select(['id', 'title', 'body', 'created_at', 'updated_at']);
        
        return Datatables::of($articles)
                        ->editColumn('title', '{{ $title."-title" }}')
                        ->make();
        
    }

    public function getBasic() {
        //return 'yes';
        return view('datatables.eloquent.basic');
    }

    public function getBasicData() {
        $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at']);

        return Datatables::of($users)
                        ->editColumn('name', '{{ $name."-name" }}')
                        ->make();
    }

}
