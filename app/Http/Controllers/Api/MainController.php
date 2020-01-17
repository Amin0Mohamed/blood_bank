<?php

namespace App\Http\Controllers\Api;

use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\DonationRequest;
use App\Models\Governorate;
use App\Models\Notification;
use App\Models\Post;
use App\Models\Token;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use MongoDB\Driver\Query;

class MainController extends Controller
{

    public function clients()
    {
        $clients=Client::all();
        return ResponseJson(1,'succes',$clients);
    }

    public function governorate()
    {
        $governorates=Governorate::all();
        return ResponseJson(1,'succes',$governorates);
    }

    public function cities()
    {
        $cities=City::all();
        return ResponseJson(1,'succes',$cities);
    }

    public function citiesSearch(Request $request)
    {
        if ($request->has('governorate_id')){
            $cities=City::where('governorate_id',$request->governorate_id)->get();
            return ResponseJson(1,'succes',$cities);
        }
        return ResponseJson(0,'failed');
    }

    public function posts()
    {
        $posts=Post::all();
        return ResponseJson(1,'succes',$posts);
    }

    public function post(Request $request)
    {
        if ($request->has('category_id')){
            $post=Post::where('category_id',$request->category_id)->get();
            return ResponseJson(1,'succes',$post);
        }else{
            return ResponseJson(0,'يجب تحديد category_id');
        }
    }

    public function categories()
    {
        $category=Category::all();
        return ResponseJson(1,'succes',$category);
    }

    public function blood_types()
    {
        $blood_types=BloodType::get();
        dd($blood_types);
        return ResponseJson(1,'succes',$blood_types);
    }

    public function donetion_requests()
    {
        $donetion_requests=DonationRequest::all();
        return ResponseJson(1,'succes',$donetion_requests);
    }

    public function donetion_request(Request $request)
    {
        if ($request->has('blood_type_id') && $request->has('city_id')){
            $donetion_request=DonationRequest::where('blood_type_id',$request->blood_type_id)
                ->where('city_id',$request->city_id)->get();
            return ResponseJson(1,'succes',$donetion_request);
        }else{
            return ResponseJson(0,'يجب تحديد فصيله الدم والمدينه');
        }
    }

    public function create_donetion_request(Request $request)
    {
        $validation = validator()->make($request->all(),[
            'patient_name'=>'required',
            'patient_age'=>'required',
            'bags_num'=>'required',
            'hospital_name'=>'required',
            'hospital_address'=>'required',
            'phone'=>'required',
            'notes'=>'required',
            'longitude'=>'required',
            'latitude'=>'required',
            'blood_type_id'=>'required',
            'city_id'=>'required',
        ]);

        if ($validation->fails())
        {
            return ResponseJson(0,$validation->errors()->first(),$validation->errors());
        }

        //create donation request
        $donationrequest = $request->user()->donationRequests()->create($request->all());
        //dd($donationrequest);
         //find clients suitable for thid donation
        $clients_ids = $donationrequest->city->governorate->clients()
           ->whereHas('blood_types',function($q) use ($donationrequest){
              $q->where('blood_types.id',$donationrequest->blood_type_id);
           })->pluck('clients.id')->toArray();

        //dd($clients_ids);
        if (count($clients_ids))
        {
            //dd(count($clients_ids));
           $notif=$donationrequest->notification()->create([
               'title'=>'احتاج متبرع الان',
               'content'=>$donationrequest->blood_type->name.'احتاج متبرع',
            ]);
            //attach clients to this notification
            $notif->clients()->attach($clients_ids);

            //send notification ito mobile
            $tokens = Token::whereIn('client_id', $clients_ids)
                ->where('token', '!=', null)->pluck('token')->toArray();
//            dd($tokens);
            $title = $notif->title;
            $body = $notif->content;
            $data = [
                'donation_request_id' => $donationrequest->id
            ];
            $send = notifyByFirebase($title, $body, $tokens, $data);
//            dd($send);
            info("firebase result: " . $send);
            return responseJson(1, 'success Add Data', compact('donationrequest'));


        }else {
            return ResponseJson(0,'لا يوجد عملاء');
         }

    }

}
