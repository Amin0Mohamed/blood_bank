<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $table = 'posts';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = array('title', 'content', 'image','des','category_id');

    public function clients()
    {
        return $this->morphToMany('App\Models\Client', 'clientable');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }


}
