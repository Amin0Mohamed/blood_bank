<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonationRequest extends Model
{
    use SoftDeletes;

    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = array('patient_name', 'patient_age', 'bags_num', 'hospital_name', 'hospital_address', 'phone', 'notes', 'longitude', 'latitude', 'blood_type_id', 'city_id','client_id');

    public function blood_type()
    {
        return $this->belongsTo('App\Models\BloodType', 'blood_type_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function notification()
    {
        return $this->hasOne('App\Models\Notification', 'donation_request_id');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client', 'client_id');
    }

}
