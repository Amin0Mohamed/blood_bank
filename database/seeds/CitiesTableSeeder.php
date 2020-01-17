<?php

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c1 =City::create([
            'name'=>'Daraw',
            'governorate_id'=>1,
        ])->save();
        $c2 =City::create([
            'name'=>'Kawm Umbu',
            'governorate_id'=>1,
        ])->save();
        $c3 =City::create([
            'name'=>'an-Nasir',
            'governorate_id'=>1,
        ])->save();
        $c4 =City::create([
            'name'=>'Abnub',
            'governorate_id'=>2,
        ])->save();
        $c5 =City::create([
            'name'=>'Abu Tij',
            'governorate_id'=>2,
        ])->save();
        $c6 =City::create([
            'name'=>'Asyut',
            'governorate_id'=>2,
        ])->save();
        $c7 =City::create([
            'name'=>'Bani Muhammadiyat',
            'governorate_id'=>2,
        ])->save();
        $c8 =City::create([
            'name'=>'Dayrut',
            'governorate_id'=>2,
        ])->save();
        $c9 =City::create([
            'name'=>'Dayrut-ash-Sharif',
            'governorate_id'=>2,
        ])->save();
        $c10 =City::create([
            'name'=>'Manfalut',
            'governorate_id'=>2,
        ])->save();

        $c11 =City::create([
            'name'=>'6th of October City',
            'governorate_id'=>3,
        ])->save();
        $c12 =City::create([
            'name'=>'Ataba',
            'governorate_id'=>3,
        ])->save();
        $c13 =City::create([
            'name'=>'Nasr City',
            'governorate_id'=>3,
        ])->save();
        $c14 =City::create([
            'name'=>'Obour City',
            'governorate_id'=>3,
        ])->save();
        $c15 =City::create([
            'name'=>'Elsadat',
            'governorate_id'=>3,
        ])->save();
        $c16 =City::create([
            'name'=>'Izbat-al-Burj',
            'governorate_id'=>4,
        ])->save();
        $c17 =City::create([
            'name'=>'Damietta',
            'governorate_id'=>4,
        ])->save();
        $c18 =City::create([
            'name'=>'Dumyat',
            'governorate_id'=>4,
        ])->save();
        $c19 =City::create([
            'name'=>'El-Zarka',
            'governorate_id'=>4,
        ])->save();
        $c20 =City::create([
            'name'=>'Faraskur',
            'governorate_id'=>4,
        ])->save();
        $c22 =City::create([
            'name'=>'Kafr Saad',
            'governorate_id'=>4,
        ])->save();

        $c23 =City::create([
            'name'=>'Biyala',
            'governorate_id'=>5,
        ])->save();
        $c24 =City::create([
            'name'=>'Disuq',
            'governorate_id'=>5,
        ])->save();
        $c25 =City::create([
            'name'=>'Fuwah',
            'governorate_id'=>5,
        ])->save();
        $c26 =City::create([
            'name'=>'Kafr-al-Jaraeidah',
            'governorate_id'=>5,
        ])->save();
        $c27 =City::create([
            'name'=>'Kafr-ash-Shaykh',
            'governorate_id'=>5,
        ])->save();
        $c28 =City::create([
            'name'=>'Mutubis',
            'governorate_id'=>5,
        ])->save();
        $c29 =City::create([
            'name'=>'Qallin',
            'governorate_id'=>5,
        ])->save();
        $c30 =City::create([
            'name'=>'Sidi Salim',
            'governorate_id'=>5,
        ])->save();
        $c31 =City::create([
            'name'=>'Marsa Matruh',
            'governorate_id'=>6,
        ])->save();
        $c32 =City::create([
            'name'=>'Nasr',
            'governorate_id'=>6,
        ])->save();
        $c33 =City::create([
            'name'=>'Sidi Barrani',
            'governorate_id'=>6,
        ])->save();
        $c34 =City::create([
            'name'=>'Zawiyat Shammas',
            'governorate_id'=>6,
        ])->save();
        $c35 =City::create([
            'name'=>'Armant',
            'governorate_id'=>7,
        ])->save();
        $c36 =City::create([
            'name'=>'Dandarah',
            'governorate_id'=>7,
        ])->save();
        $c37 =City::create([
            'name'=>'Dishna',
            'governorate_id'=>7,
        ])->save();
        $c38 =City::create([
            'name'=>'Farshut',
            'governorate_id'=>7,
        ])->save();
        $c39 =City::create([
            'name'=>'Hijazah',
            'governorate_id'=>7,
        ])->save();
        $c40 =City::create([
            'name'=>'FHiwarshut',
            'governorate_id'=>7,
        ])->save();

        $c400 =City::create([
            'name'=>'Akhmim',
            'governorate_id'=>8,
        ])->save();
        $c41 =City::create([
            'name'=>'Awlad Tawq Sharq',
            'governorate_id'=>8,
        ])->save();
        $c42 =City::create([
            'name'=>'Dar-as-Salam',
            'governorate_id'=>8,
        ])->save();
        $c43 =City::create([
            'name'=>'Jirja',
            'governorate_id'=>8,
        ])->save();

        $c44 =City::create([
            'name'=>'Aja',
            'governorate_id'=>9,
        ])->save();
        $c45 =City::create([
            'name'=>'Bahut',
            'governorate_id'=>9,
        ])->save();
        $c46 =City::create([
            'name'=>'Bilqas',
            'governorate_id'=>9,
        ])->save();
        $c47 =City::create([
            'name'=>'Dikirnis',
            'governorate_id'=>9,
        ])->save();

        $c48 =City::create([
            'name'=>'Minyat-an-Nasr',
            'governorate_id'=>9,
        ])->save();

        $c49 =City::create([
            'name'=>'Ashmun',
            'governorate_id'=>10,
        ])->save();
        $c50 =City::create([
            'name'=>'Birkat-as-Sab',
            'governorate_id'=>10,
        ])->save();
        $c51 =City::create([
            'name'=>'Milij',
            'governorate_id'=>10,
        ])->save();
        $c52 =City::create([
            'name'=>'Minuf',
            'governorate_id'=>10,
        ])->save();
        $c53 =City::create([
            'name'=>'Quwaysina',
            'governorate_id'=>10,
        ])->save();
        $c54 =City::create([
            'name'=>'Shibin-al-Kawm',
            'governorate_id'=>10,
        ])->save();
        $c55 =City::create([
            'name'=>'Sirs-al-Layyanah',
            'governorate_id'=>10,
        ])->save();


    }
}
