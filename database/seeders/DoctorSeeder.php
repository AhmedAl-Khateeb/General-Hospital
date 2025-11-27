<?php

namespace Database\Seeders;

use App\Models\Appointment;
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
        $sectionId = Section::pluck('id')->toArray();
        $appointments = Appointment::pluck('id')->toArray();

        for ($i = 0; $i < self::$count; $i++) {
            $doctor = Doctor::create([
                'name' => [
                    'ar' => 'دكتور ' . $i,
                    'en' => 'Doctor ' . $i,
                ],
                'email' => 'doctor' . $i . '@gmail.com',
                'password' => Hash::make('password123'),
                'phone' => "010000000$i",
                'email_verified_at' => now(),
                'section_id' => $faker->randomElement($sectionId),
            ]);
            $doctor->appointments()->attach(
                $faker->randomElements($appointments, rand(1, 3))
            );
        }
    }
}
