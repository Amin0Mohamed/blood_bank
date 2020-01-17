<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ClientResetPasswordNotification;

class Client extends Authenticatable
{
    use Notifiable,SoftDeletes;


    protected $guard='client';

    protected $table = 'clients';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = array('phone','name', 'email', 'password', 'date_of_birth', 'last_donation_date', 'pin_code', 'blood_type_id', 'city_id');


    protected $hidden = [
        'password', 'remember_token','api_token'
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'clientable');
    }

    public function notifications()
    {
        return $this->morphedByMany('App\Models\Notification', 'clientable');
    }

    public function blood_types()
    {
        return $this->morphedByMany('App\Models\BloodType', 'clientable');
    }

    public function governorates()
    {
        return $this->morphedByMany('App\Models\Governorate', 'clientable');
    }

    public function blood_type()
    {
        return $this->belongsTo('App\Models\BloodType', 'blood_type_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function tokens()
    {
        return $this->hasMany('App\Models\Token', 'client_id');
    }

    public function donationRequests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
