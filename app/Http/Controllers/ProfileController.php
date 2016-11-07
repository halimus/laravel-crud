<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\User;
use Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $user = Auth::user();
        //dd($user);
        return view('profile.profile', compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function update() {
        $user = Auth::user();

        $rules = $this->rules_update($user->users_id);
        $validator = Validator::make(Request::all(), $rules);

        if ($validator->fails()) {
            //return Redirect::to("/users/$id/edit")->withInput()->withErrors($validator);
            return back()->withErrors($validator)->withInput();
        } else {
            $user->update(Request::all());
            //return Redirect::to('users');
            return redirect('profile');
        }
        
    }

    /**
     * 
     */
    public function password() {
        $user = Auth::user();
        return view('profile.password', compact('user'));
    }

    /*
     * 
     */

    public function change_password() {
        $user = Auth::user();
        
        $rules = array(
            'old_password' => 'required',
            'password' => 'required|min:6|confirmed',
            //'password' => 'required|alphaNum|between:6,16|confirmed',
            'password_confirmation' => 'required|min:6',
        );
        
        $validator = Validator::make(Request::all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        else {
           $password = bcrypt(Request::get('password'));
           $user->update(['password' => $password]);
           //return Redirect::to('users');
           return redirect('password');
        }
        
    }

    
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules_update($users_id) {
        return [
            'username' => 'required|min:3|max:15',
            'email' => 'required|email|max:45|unique:users,email, ' . $users_id . ',users_id'
        ];
    }
    

}
