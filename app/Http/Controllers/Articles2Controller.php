<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     */
    public function index() {


        return view('articles2.index');
    }

}
