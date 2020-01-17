<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetCityController extends Controller
{
   public function getCity($id)
   {
       $cities = City::where('governorate_id',$id)->get();
       $data='';
       foreach ($cities as $citie )
       {
           $data .= ' <option value='.$citie->id.'>'.$citie->name.'</option><br>';
       }
       return $data;
   }

    public function updateStatus(Request $request)
    {
        $user = Client::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        session()->flash('success',__('site.update_successfully'));

        return response()->json(['message' => 'User status updated successfully.']);
    }

}//end class
