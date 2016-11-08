<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\User;
use Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Hash;
use Session;

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
            
            //Session::flash('flash_message', 'Your profile has been updated!');
            //Session::flash('flash_message_important', true);
            
            //return redirect('profile');
            
            /*
            return redirect('profile')->with([
                'flash_message' => 'Your profile has been updated!',
                'flash_message_important' => true   
            ]);
            */
            
            flash('Your profile has been updated!')->important();
            
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
        
        $old_password = Request::get('old_password');

        $validator = Validator::make(Request::all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } 
        else {
            /*if (!$hasher->check($oldPassword, $user->password) || $password != $passwordConf) {
                Session::flash('error', 'Check input is correct.');
                return View::make('passwords/reset');
            }*/
            //if (Hash::check($current_password, $user->password) && $user_count == 1) {
            
            //if (Hash::check($current_password, $user->password) && $user_count == 1) {

            if(!Hash::check($old_password, $user->password)){
                //die('machi kif kif');
                Session::flash('error', 'The old password is incorect');
                return redirect('password');
            }
            
            $password = bcrypt(Request::get('password'));
            $user->update(['password' => $password]);
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
