<?php

use Illuminate\Database\Seeder;
use App\Models\BloodType;

class Blood_typesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $b1 =BloodType::create([
            'name'=>'A+',
        ])->save();
        $b2 =BloodType::create([
            'name'=>'A-',
        ])->save();
        $b3 =BloodType::create([
            'name'=>'B+',
        ])->save();
        $b4 =BloodType::create([
            'name'=>'B-',
        ])->save();
        $b2 =BloodType::create([
            'name'=>'O+',
        ])->save();
        $b6 =BloodType::create([
            'name'=>'O-',
        ])->save();
        $b7 =BloodType::create([
            'name'=>'AB+',
        ])->save();
        $b8 =BloodType::create([
            'name'=>'AB-',
        ])->save();
    }
}
