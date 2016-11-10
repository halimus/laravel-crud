<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Yajra\Datatables\Facades\Datatables;
use App\Article;

class ArticlesDTController extends Controller {
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
        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     */
    public function getBasicData() {

        $articles = Article::select(['id', 'title', 'body', 'created_at', 'updated_at']);
        return Datatables::of($articles)->make();

        //return Datatables::of(Article::query())->make();
    }

    /**
     * Process datatables ajax request.
     */
    public function AddEditRemoveColumn() {

        $articles = Article::select(['id', 'title', 'body', 'created_at', 'updated_at']);

        return Datatables::of($articles)->addColumn('action', 'edit')->make();

        //return Datatables::of(Article::query())->make();
    }


}
