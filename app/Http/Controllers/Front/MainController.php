<?php

namespace App\Http\Controllers\Front;


use App\Mail\ContactFormMail;
use App\Mail\ResetPassword;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\DonationRequest;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Mail;
use UxWeb\SweetAlert\SweetAlert;

class mainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

     public function home()
     {
         $articals = Post::all()->take('6');
         $donations = DonationRequest::with('city','blood_type')->get();
         return view('front.pages.home',compact('articals','donations'));
     }
     public function aboutUs()
     {
         return view('front.pages.about-us');
     }
     public function articals()
     {
         $posts = Post::paginate(6);
         return view('front.pages.articals',compact('posts'));
     }

     public function articalDetails($id)
     {
         $post = Post::find($id);
         return view('front.pages.artical-details',compact('post'));
     }

     public function contact()
     {
         return view('front.pages.contact');
     }
     public function storeMessage(Request $request )
     {
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);
         $contact =Contact::create($request->all());
       //  Mail::to('omar@amin.com')->send(new ContactFormMail($data));
         Mail::to('aminelcaptain20@gmail.com')->send(new ResetPassword($request->all()));
       session()->flash('success','successfully sending');
        return redirect()->back();
     }

     public function donation()
     {

        $donations = DonationRequest::with('city','blood_type')->paginate(6);
         return view('front.pages.donation',compact('donations'));
     }

     public function donationDetails($id)
     {
        $donation = DonationRequest::find($id);
         return view('front.pages.donation-details',compact('donation'));
     }

     public function signNewDonation()
     {
         return view('front.pages.sign-new-donation');
     }


     public function storeDonation(Request $request)
     {

         $request->validate(
             [
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
             ]
         );

          $request->user()->donationRequests()->create($request->all());
          //session()->flash('success','تمت اضافه حاله جديده');
         alert()->message('تمت اضافه حاله جديده', 'Done');

         return redirect()->back();
     }

//donation filter with city_id and blood_type_id
    public function donetion_filtter(Request $request)
    {
//        $users = App\User::all();
//        $newUsers = $users->filter(function ($user) {
//            return $user->votes > 100 || $user->name == 'John';
//        });
        if ($request->has('blood_type') && $request->has('city')){
            $donetions =DonationRequest::where('blood_type_id',$request->blood_type)
                ->Where('city_id',$request->city)->get();

        }

        $data='';
        foreach ($donetions as $donation)
        {
            $data .= ' <div class="don w-75"><div class="blood_type">'.$donation->blood_type->name.'</div>
                      <div class="data">
                          <ul class="list-unstyled">
                              <li>
                                  الاسم:
                                  <span class=" text-uppercase p-2" style="color: #09c;font-size: 20px;font-weight: 800">'.$donation->patient_name.'</span>
                              </li>
                              <li>
                                  مستشفي:
                                  <span class="text-uppercase p-2" style="color: #09c;font-size: 20px;font-weight: 800">'.$donation->hospital_name.'</span>
                              </li>
                              <li>
                                  مدينه:
                                 <span class="text-uppercase p-2" style="color: #09c;font-size: 20px;font-weight: 800">'.$donation->city->name.'</span>

                              </li>
                          </ul>
                      </div>
                    <a href="http://localhost/blood_bank/public/donation-details/'.$donation->id.'" class="btn btn-light">التفاصيل</a>
                  </div>  ';
        }
        return $data;
    }


    public function toggle(Request $request)
    {
        $toggle = $request->user()->favourites()->toggle($request->post_id);
        return ResponseJson(1,'success',$toggle);
    }

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

}
