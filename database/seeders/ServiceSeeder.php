<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ServiceSeeder extends Seeder
{
    public static int $count = 20;

    public function run(): void
    {
        // امسح كل البيانات القديمة
        Service::query()->delete();

        $services = [
            [
                'ar' => 'كشف باطنة',
                'en' => 'Internal Medicine Consultation',
            ],
            [
                'ar' => 'كشف قلب',
                'en' => 'Cardiology Consultation',
            ],
            [
                'ar' => 'كشف أطفال',
                'en' => 'Pediatrics Consultation',
            ],
            [
                'ar' => 'كشف عظام',
                'en' => 'Orthopedic Consultation',
            ],
            [
                'ar' => 'كشف أنف وأذن وحنجرة',
                'en' => 'ENT Consultation',
            ],
            [
                'ar' => 'كشف جلدية',
                'en' => 'Dermatology Consultation',
            ],
            [
                'ar' => 'استشارة متابعة',
                'en' => 'Follow-up Consultation',
            ],
            [
                'ar' => 'قياس ضغط',
                'en' => 'Blood Pressure Check',
            ],
            [
                'ar' => 'قياس سكر',
                'en' => 'Blood Sugar Test',
            ],
            [
                'ar' => 'رسم قلب (ECG)',
                'en' => 'ECG Test',
            ],
            [
                'ar' => 'أشعة سينية',
                'en' => 'X-Ray',
            ],
            [
                'ar' => 'تحاليل شاملة',
                'en' => 'Full Lab Tests',
            ],
            [
                'ar' => 'تحاليل سكر',
                'en' => 'Glucose Test',
            ],
            [
                'ar' => 'تحاليل كوليسترول',
                'en' => 'Cholesterol Test',
            ],
            [
                'ar' => 'استشارة تغذية',
                'en' => 'Nutrition Consultation',
            ],
        ];

        $descriptions = [
            [
                'ar' => 'فحص شامل للحالة مع مراجعة التاريخ المرضي.',
                'en' => 'Full checkup with medical history review.',
            ],
            [
                'ar' => 'استشارة سريعة لمتابعة الخطة العلاجية الحالية.',
                'en' => 'Quick follow-up on the current treatment plan.',
            ],
            [
                'ar' => 'خدمة مخصصة للكشف المبكر عن الأمراض المزمنة.',
                'en' => 'Service focused on early detection of chronic diseases.',
            ],
            [
                'ar' => 'تشخيص أولي ووضع خطة علاج مبدئية.',
                'en' => 'Initial diagnosis and preliminary treatment plan.',
            ],
            [
                'ar' => 'مراجعة نتائج التحاليل والأشعة السابقة.',
                'en' => 'Review of previous lab and imaging results.',
            ],
        ];

        $count = min(self::$count, count($services));

        $shuffledServices = collect($services)->shuffle()->take($count);

        foreach ($shuffledServices as $serviceName) {
            $description = Arr::random($descriptions);

            Service::create([
                'name' => [
                    'ar' => $serviceName['ar'],
                    'en' => $serviceName['en'],
                ],
                'description' => [
                    'ar' => $description['ar'],
                    'en' => $description['en'],
                ],
                'price' => rand(100, 1000),
                'status' => (bool) rand(0, 1),
            ]);
        }
    }
}
