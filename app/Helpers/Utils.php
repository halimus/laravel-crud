<?php

namespace App\Helpers;

class Utils {
    /*
     * 
     */

    public static function getDate() {
        $date = date('Y');
        return $date;
    }

    /*
     * 
     */

    public static function no_cache() {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }
    
    /*
     * 
     */
    public static function sayHello() {
        return 'Hello';
    }

}
