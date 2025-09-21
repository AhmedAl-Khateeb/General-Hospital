<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['ar' => 'أمراض القلب',      'en' => 'Cardiology'],
            ['ar' => 'العيون',           'en' => 'Ophthalmology'],
            ['ar' => 'العظام',           'en' => 'Orthopedics'],
            ['ar' => 'الأطفال',          'en' => 'Pediatrics'],
            ['ar' => 'النساء والتوليد',  'en' => 'Gynecology & Obstetrics'],
            ['ar' => 'الأنف والأذن',     'en' => 'ENT'],
            ['ar' => 'الباطنة',          'en' => 'Internal Medicine'],
            ['ar' => 'الجلدية',          'en' => 'Dermatology'],
            ['ar' => 'المخ والأعصاب',    'en' => 'Neurology'],
            ['ar' => 'الجراحة العامة',   'en' => 'General Surgery'],
            ['ar' => 'المسالك البولية',  'en' => 'Urology'],
            ['ar' => 'الأورام',          'en' => 'Oncology'],
            ['ar' => 'الأسنان',          'en' => 'Dentistry'],
            ['ar' => 'النفسية والعصبية', 'en' => 'Psychiatry'],
            ['ar' => 'التخدير',          'en' => 'Anesthesiology'],
        ];

        foreach ($sections as $section) {
            Section::create([
                'name' => $section,
            ]);
        }
    }
}
