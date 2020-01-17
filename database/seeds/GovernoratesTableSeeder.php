<?php

use Illuminate\Database\Seeder;
use App\Models\Governorate;

class GovernoratesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $g1 =Governorate::create([
            'name'=>'Aswan',
        ])->save();
        $g2 =Governorate::create([
            'name'=>'Asyut',
        ])->save();

        $g11 =Governorate::create([
            'name'=>'Cairo',
        ])->save();

        $g10 =Governorate::create([
            'name'=>'Dumyat',
        ])->save();

        $g9 =Governorate::create([
            'name'=>'Kafr-ash-Shaykh',
        ])->save();

        $g8 =Governorate::create([
            'name'=>'Matruh',
        ])->save();
        $g7 =Governorate::create([
            'name'=>'Qina',
        ])->save();

        $g6 =Governorate::create([
            'name'=>'Sawhaj',
        ])->save();

        $g5 =Governorate::create([
            'name'=>'ad-Daqahliyah',
        ])->save();
        $g4 =Governorate::create([
            'name'=>'al-Minufiyah',
        ])->save();







    }
}
