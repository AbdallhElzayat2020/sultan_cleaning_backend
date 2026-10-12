<?php

namespace Database\Seeders;

use App\Models\WhyChooseUs;
use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'icon' => 'fa-solid fa-users-gear',
                'title' => 'عمالة فنية مدربة',
                'description' => 'طاقم عمل محترف وخبير خضع لأعلى تدريبات الأمان والجودة وحسن التعامل مع الممتلكات والمفروشات الثمينة.',
                'status' => true,
                'order' => 1,
            ],
            [
                'icon' => 'fa-solid fa-spray-can-sparkles',
                'title' => 'أحدث أجهزة البخار',
                'description' => 'معدات ألمانية وإيطالية متطورة بقوة ضغط عالية لإزالة أصعب البقع والجراثيم الدقيقة بنسبة 99.9%.',
                'status' => true,
                'order' => 2,
            ],
            [
                'icon' => 'fa-solid fa-leaf',
                'title' => 'مواد آمنة ومعتمدة',
                'description' => 'منظفات ومطهرات صديقة للبيئة، خالية من الروائح الكيميائية الضارة وآمنة تماماً للأطفال والحيوانات الأليفة.',
                'status' => true,
                'order' => 3,
            ],
            [
                'icon' => 'fa-solid fa-clock-rotate-left',
                'title' => 'التزام صارم بالمواعيد',
                'description' => 'نقدر وقتك الثمين؛ نصل في الموعد المحدد بدقة وننجز العمل في أسرع وقت وبأعلى معايير الإتقان.',
                'status' => true,
                'order' => 4,
            ],
            [
                'icon' => 'fa-solid fa-shield-heart',
                'title' => 'الضمان الذهبي للجودة',
                'description' => 'إذا لم تكن راضياً 100% عن مستوى النظافة، سنقوم بإعادة تنظيف المكان مجاناً وبدون أي تكلفة إضافية.',
                'status' => true,
                'order' => 5,
            ],
            [
                'icon' => 'fa-solid fa-hand-holding-dollar',
                'title' => 'أسعار تنافسية وشفافة',
                'description' => 'نقدم خطط أسعار تنافسية وعادلة ومناسبة لجميع الاحتياجات بدون أي تكاليف خفية لضمان أفضل قيمة مقابل الخدمة.',
                'status' => true,
                'order' => 6,
            ],
        ];

        foreach ($features as $feature) {
            WhyChooseUs::updateOrCreate(
                ['title' => $feature['title']],
                $feature
            );
        }
    }
}
