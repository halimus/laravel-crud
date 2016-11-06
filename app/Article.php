<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $fillable = [
        'title',
        'body',
        'published_at'
    ];
    protected $dates = ['published_at'];

    /*
     * An article is owned by a user
     */

    public function user($param) {

        return $this->belongsTo('App\User');
    }

}
