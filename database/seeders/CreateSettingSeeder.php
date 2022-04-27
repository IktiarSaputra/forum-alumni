<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class CreateSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = [
            [
               'name_app' => 'Forum Alumni SMAN 48 JAKARTA',
               'about_app' => 'Web Forum Diskusi Untuk Alumni SMAN 48 JAKARTA',
            ]
        ];
  
        foreach ($setting as $key => $value) {
            Setting::create($value);
        }
    }
}
