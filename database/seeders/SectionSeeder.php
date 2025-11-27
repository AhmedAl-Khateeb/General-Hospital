<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sections')->delete();

        $sections = [
            [
                'ar' => 'أمراض القلب',
                'en' => 'Cardiology',
                'desc_ar' => 'متخصص في تشخيص وعلاج أمراض القلب والأوعية الدموية.',
                'desc_en' => 'Specializes in diagnosis and treatment of heart and cardiovascular diseases.',
            ],
            [
                'ar' => 'العيون',
                'en' => 'Ophthalmology',
                'desc_ar' => 'يعنى بأمراض العيون وتشخيصها وإجراء العمليات الجراحية المرتبطة بها.',
                'desc_en' => 'Responsible for diagnosing and treating eye diseases and performing related surgeries.',
            ],
            [
                'ar' => 'العظام',
                'en' => 'Orthopedics',
                'desc_ar' => 'يعالج مشاكل الجهاز العضلي الهيكلي مثل الكسور والتشوهات والإصابات الرياضية.',
                'desc_en' => 'Treats musculoskeletal issues such as fractures, deformities, and sports injuries.',
            ],
            [
                'ar' => 'الأطفال',
                'en' => 'Pediatrics',
                'desc_ar' => 'معني برعاية صحة الأطفال من الولادة وحتى سن البلوغ.',
                'desc_en' => 'Focuses on children’s health from birth to adolescence.',
            ],
            [
                'ar' => 'النساء والتوليد',
                'en' => 'Gynecology & Obstetrics',
                'desc_ar' => 'متخصص في صحة المرأة، الحمل، والولادة.',
                'desc_en' => 'Specializes in women’s health, pregnancy, and childbirth.',
            ],
            [
                'ar' => 'الأنف والأذن',
                'en' => 'ENT',
                'desc_ar' => 'يشخص ويعالج أمراض الأنف والأذن والحنجرة.',
                'desc_en' => 'Diagnoses and treats ear, nose, and throat disorders.',
            ],
            [
                'ar' => 'الباطنة',
                'en' => 'Internal Medicine',
                'desc_ar' => 'يعالج الأمراض المزمنة والحالات الطبية غير الجراحية للبالغين.',
                'desc_en' => 'Manages chronic diseases and non-surgical medical conditions for adults.',
            ],
            [
                'ar' => 'الجلدية',
                'en' => 'Dermatology',
                'desc_ar' => 'يعالج أمراض الجلد والشعر والأظافر.',
                'desc_en' => 'Treats skin, hair, and nail disorders.',
            ],
            [
                'ar' => 'المخ والأعصاب',
                'en' => 'Neurology',
                'desc_ar' => 'متخصص في أمراض المخ والجهاز العصبي.',
                'desc_en' => 'Specializes in brain and nervous system disorders.',
            ],
            [
                'ar' => 'الجراحة العامة',
                'en' => 'General Surgery',
                'desc_ar' => 'يجري العمليات الجراحية في مجالات متعددة مثل البطن والغدة الدرقية.',
                'desc_en' => 'Performs surgeries in multiple areas, such as abdominal and thyroid operations.',
            ],
            [
                'ar' => 'المسالك البولية',
                'en' => 'Urology',
                'desc_ar' => 'يعالج أمراض الجهاز البولي والتناسلي للذكور.',
                'desc_en' => 'Treats urinary tract disorders and male reproductive system issues.',
            ],
            [
                'ar' => 'الأورام',
                'en' => 'Oncology',
                'desc_ar' => 'متخصص في تشخيص وعلاج السرطان.',
                'desc_en' => 'Specializes in cancer diagnosis and treatment.',
            ],
            [
                'ar' => 'الأسنان',
                'en' => 'Dentistry',
                'desc_ar' => 'يعنى بعلاج مشاكل الأسنان واللثة وتجميل الأسنان.',
                'desc_en' => 'Focuses on dental treatments, gum diseases, and cosmetic dentistry.',
            ],
            [
                'ar' => 'النفسية والعصبية',
                'en' => 'Psychiatry',
                'desc_ar' => 'يعالج الاضطرابات النفسية والسلوكية.',
                'desc_en' => 'Treats mental and behavioral disorders.',
            ],
            [
                'ar' => 'التخدير',
                'en' => 'Anesthesiology',
                'desc_ar' => 'مسؤول عن التخدير الطبي أثناء الجراحات ومتابعة حالة المريض.',
                'desc_en' => 'Responsible for medical anesthesia during surgeries and patient monitoring.',
            ],
        ];

        foreach ($sections as $section) {
            Section::create([
                'name' => [
                    'ar' => $section['ar'],
                    'en' => $section['en'],
                ],
                'description' => [
                    'ar' => $section['desc_ar'],
                    'en' => $section['desc_en'],
                ],
            ]);
        }
    }
}
