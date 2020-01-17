<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('notification_settings_text','header_logo', 'footer_logo', 'slogan', 'intro_image', 'address','insta_link','youtube_link', 'fb_link', 'tw_link', 'github_link','email','phone', 'whatsupp_number','play_store_link','app_store_link','app_logo','about_app');

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
