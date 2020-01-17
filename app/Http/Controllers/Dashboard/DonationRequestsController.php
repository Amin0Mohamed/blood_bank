<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\DonationRequest;
use App\Http\Controllers\Controller;

class DonationRequestsController extends Controller
{

    public function index()
    {
        $d_requestes = DonationRequest::all();
        return view('dashboard.donation-requests.index',compact('d_requestes'));
    }


}
