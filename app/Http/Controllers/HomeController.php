<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $laravel = app();
        $curent_version = $laravel::VERSION;
        
        //return "Your Laravel version is " . $laravel::VERSION;
        /* You can also browse to and open file 
          vendor\laravel\framework\src\Illuminate\Foundation\Application.php
         */
        
        return view('home', compact('curent_version'));
        
    }

}
