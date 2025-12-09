<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class GroupSeeder extends Seeder
{
    public static int $count = 10;

    public function run(): void
    {
        $groupNames = [
            [
                'ar' => 'باقة الكشف والمتابعة',
                'en' => 'Consultation & Follow-up Package',
            ],
            [
                'ar' => 'باقة القلب الشاملة',
                'en' => 'Complete Cardiology Package',
            ],
            [
                'ar' => 'باقة الفحص الشامل',
                'en' => 'Full Checkup Package',
            ],
            [
                'ar' => 'باقة تحاليل الأمراض المزمنة',
                'en' => 'Chronic Disease Lab Package',
            ],
            [
                'ar' => 'باقة متابعة مرضى الضغط والسكر',
                'en' => 'Hypertension & Diabetes Follow-up Package',
            ],
        ];

        $descriptions = [
            [
                'ar' => 'مجموعة خدمات تشمل الكشف والمتابعة وبعض التحاليل الأساسية.',
                'en' => 'A set of services including consultation, follow-up, and basic lab tests.',
            ],
            [
                'ar' => 'باقة مخصصة للفحص الدوري والوقاية من الأمراض المزمنة.',
                'en' => 'Package focused on periodic checkups and chronic disease prevention.',
            ],
            [
                'ar' => 'تجميعة خدمات بسعر أقل من حجز كل خدمة لوحدها.',
                'en' => 'Bundle of services at a lower price than booking them separately.',
            ],
        ];

        $allServiceIds = Service::pluck('id');

        for ($i = 0; $i < self::$count; $i++) {
            $groupName = Arr::random($groupNames);
            $description = Arr::random($descriptions);

            $totalBefore = rand(1000, 5000);
            $discount = rand(100, 500);
            $totalAfter = $totalBefore - $discount;
            $taxRate = 0.15; // 15%
            $totalWithTax = (int) round($totalAfter * (1 + $taxRate));

            $group = Group::create([
                'name' => [
                    'ar' => $groupName['ar'],
                    'en' => $groupName['en'],
                ],
                'description' => [
                    'ar' => $description['ar'],
                    'en' => $description['en'],
                ],
                'total_before_discount' => $totalBefore,
                'discount_value' => $discount,
                'total_after_discount' => $totalAfter,
                'text_rate' => '15%',
                'total_with_tax' => $totalWithTax,
                'is_active' => (bool) rand(0, 1),
            ]);

            // ربط الجروب بخدمات عشوائية في الجدول الوسيط
            $servicesForGroup = $allServiceIds
                ->shuffle()
                ->take(rand(2, 6)); // من 2 لـ 6 خدمات في الجروب

            $group->services()->attach($servicesForGroup);
        }
    }
}
