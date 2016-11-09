<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\Articles3DataTable;

class Article3Controller extends Controller {

    
    public function index(Articles3DataTable $dataTable) {
        
        
        return $dataTable->render('articles2.index3');

        
    }

}
