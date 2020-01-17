<?php

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Setting;
use \Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
             'name'=>'amin mohamed',
             'email'=>'amin@amin.com',
             'password'=>'55555',
             'image'=>'15.jpg',
        ]);

        $user->save();
        $user->assignRole('super_admin');

        $setting = Setting::create([
            'notification_settings_text'=>'amin mohamed',
            'about_app'=>'تطبيق بنك الدم',
            'phone'=>'01002932471',
            'header_logo'=>'logo.png',
            'footer_logo'=>'logo.png',
            'slogan'=>'بنك الدم هذا النص هو مثال لنص ممكن أن يستبدل فى نفس',
            'email'=>'kemo30@gmail.com',
            'fb_link'=>'https://www.facebook.com',
            'intro_image'=>'about.png',
            'tw_link'=>'https://www.youtube.com/',
            'github_link'=>'https://www.youtube.com/',
            'address'=>'932 South 7th Street',
            'whatsupp_number'=>'010010100101',
            'youtube_link'=>'https://www.youtube.com/',
            'insta_link'=>'https://www.youtube.com',
            'app_logo'=>'google1.png',
            'play_store_link'=>'https://www.youtube.com/',
            'app_store_link'=>'https://www.youtube.com/',
            'user_id'=>$user->id,
        ]);
    }
}
