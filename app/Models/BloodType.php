<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{

    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function clients_morph()
    {
        return $this->morphToMany('App\Models\Client', 'clientable');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Client', 'blood_type_id');
    }

    public function donation_requests()
    {
        return $this->hasMany('App\Models\DonationRequest', 'blood_type_id');
    }

}
