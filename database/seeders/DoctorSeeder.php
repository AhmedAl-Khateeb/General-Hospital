<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DoctorSeeder extends Seeder
{

    public static int $count = 15;

    public function run(): void
    {

        $faker = \Faker\Factory::create();

        $daysAr = ['السبت', 'الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة'];
        $daysEn = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

        $sectionId = Section::pluck('id')->toArray();

        for ($i = 0; $i < self::$count; $i++) {
            Doctor::create([
                'name' => [
                    'ar' => 'دكتور ' . $i,
                    'en' => 'Doctor ' . $i,
                ],
                'appointments' => [
                    'ar' =>  $faker->randomElements($daysAr, rand(2, 4)),
                    'en' => $faker->randomElements($daysEn, rand(2, 4)),
                ],
                'email' => 'doctor' . $i . '@gmail.com',
                'password' => Hash::make('password123'),
                'phone' => "010000000$i",
                'price' => rand(10, 100),
                'email_verified_at' => now(),
                'section_id' => $faker->randomElement($sectionId),
            ]);
        }
    }
}
