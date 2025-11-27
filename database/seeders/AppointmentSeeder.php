<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('appointments')->delete();

        $appointments = [
            [
                'name' => [
                    'en' => 'Saturday',
                    'ar' => 'السبت',
                ],
            ],
            [
                'name' => [
                    'en' => 'Sunday',
                    'ar' => 'الأحد',
                ],
            ],
            [
                'name' => [
                    'en' => 'Monday',
                    'ar' => 'الاثنين',
                ],
            ],
            [
                'name' => [
                    'en' => 'Tuesday',
                    'ar' => 'الثلاثاء',
                ],
            ],
            [
                'name' => [
                    'en' => 'Wednesday',
                    'ar' => 'الأربعاء',
                ],
            ],
            [
                'name' => [
                    'en' => 'Thursday',
                    'ar' => 'الخميس',
                ],
            ],
            [
                'name' => [
                    'en' => 'Friday',
                    'ar' => 'الجمعة',
                ],
            ],
        ];

        foreach ($appointments as $appointment) {
            Appointment::create($appointment);
        }
    }
}
