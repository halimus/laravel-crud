<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\ArticlesDataTable;

class ArticlesDTSController extends Controller {

    
    public function index(ArticlesDataTable $dataTable) {
        
        
        return $dataTable->render('datatables.index2');

        
    }

}
