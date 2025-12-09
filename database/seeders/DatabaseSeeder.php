<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            AppointmentSeeder::class,
            SectionSeeder::class,
            DoctorSeeder::class,
            ServiceSeeder::class,
            GroupSeeder::class,
        ]);
    }
}
