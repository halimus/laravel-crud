<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables;

class Articles2Controller extends Controller {
    /*
     * 
     */

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     * Documentation:
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
    public function data() {

        //
        //return Datatables::of(\App\Article::query())->make(true);
        return Datatables::queryBuilder(DB::table('articles'))->make(true);

        // Using Eloquent
//        return Datatables::eloquent(User::query())->make(true);

        // Using Query Builder
//        return Datatables::queryBuilder(DB::table('users'))->make(true);

        // Using Collection
//        return Datatables::collection(User::all())->make(true);

        // Using the Engine Factory
//        return Datatables::of(User::query())->make(true);
//        return Datatables::of(DB::table('users'))->make(true);
//        return Datatables::of(User::all())->make(true);
    }

}
