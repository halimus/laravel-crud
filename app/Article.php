<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

//    protected $table = 'articles';
//    protected $primaryKey = 'articles_id';

    protected $fillable = [
        'title',
        'body',
        'published_at',
        'users_id'
    ];
    protected $dates = ['published_at'];

    /*
     * An article is owned by a user
     */

    public function user($param) {
        return $this->belongsTo('App\User');
    }

    /*
     * setNameAttribute
     * if we want set address we do:
     * setAdressAtribute
     * this function is useful to manipulate data before save or retreive from database
     */

    public function setPublishedAtAttribute($date) {
        //$this->attributes['published_at'] = \Carbon\Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = \Carbon\Carbon::parse($date);
    }

    /*
     * query scope
     */

    public function scopePublished($query) {
        $query->where('published_at', '<=', Carbon::now());  // not give the articles that published in the future
    }
    
        /*
     * query scope
     */

    public function scopeUpublished($query) {
        $query->where('published_at', '>', Carbon::now());  // give the articles that published in the future
    }

}
