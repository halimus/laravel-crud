<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller {
    /*
     * 
     */

    public function __construct() {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function profile() {


        return view('profile.profile');
    }
    
    /**
       * 
     */
    public function password() {


        return view('profile.password');
    }

}
