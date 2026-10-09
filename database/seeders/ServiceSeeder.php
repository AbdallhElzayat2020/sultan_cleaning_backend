<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'تنظيف المنازل والفلل',
                'slug' => 'house-cleaning',
                'icon' => 'fa-solid fa-house-chimney-window',
                'image' => null,
                'short_description' => 'تنظيف شامل للشقق والفلل بفريق مدرّب ومواد آمنة على الأطفال والحيوانات الأليفة مع تعقيم كامل لكافة الغرف.',
                'description' => '<p>تعتبر خدمة تنظيف المنازل والفلل من سلطان كلين الحل المتكامل لنظافة عميقة تفوق التوقعات، حيث نستخدم أحدث أجهزة جلي الأرضيات والمكانس الإيطالية مع منظفات صديقة للبيئة تضمن بيئة صحية وآمنة لك ولعائلتك.</p>',
                'status' => true,
                'order' => 1,
            ],
            [
                'title' => 'تنظيف المكاتب والشركات',
                'slug' => 'office-cleaning',
                'icon' => 'fa-solid fa-building',
                'image' => null,
                'short_description' => 'نظافة يومية أو أسبوعية للمكاتب بمواعيد مرنة خارج أوقات العمل حتى لا نعطل إنتاجية فريقك.',
                'description' => '<p>نوفر حلول تنظيف احترافية للمقرات والشركات تشمل تنظيف المكاتب، غرف الاجتماعات، الأرضيات، والأبواب الزجاجية بأعلى معايير الانضباط والسرية التامة.</p>',
                'status' => true,
                'order' => 2,
            ],
            [
                'title' => 'غسيل السجاد والكنب بالبخار',
                'slug' => 'carpet-sofa-cleaning',
                'icon' => 'fa-solid fa-couch',
                'image' => null,
                'short_description' => 'غسيل عميق بالبخار الحار يزيل البقع المستعصية والروائح الكريهة ويجف سريعاً في مكانه دون الحاجة لنقل الأثاث.',
                'description' => '<p>تقنية التنظيف بالبخار الحار تقضي على 99.9% من البكتيريا وحشرات الفراش مع الحفاظ على ألوان وجودة الأقمشة والمفروشات الثمينة مع التعطير الفندقي الفاخر.</p>',
                'status' => true,
                'order' => 3,
            ],
            [
                'title' => 'تنظيف الزجاج والواجهات',
                'slug' => 'glass-facade-cleaning',
                'icon' => 'fa-solid fa-window-maximize',
                'image' => null,
                'short_description' => 'تنظيف الواجهات الزجاجية والنوافذ الخارجية والداخلية بمعدات أمان متطورة لجميع الارتفاعات مع لمعان يدوم طويلاً.',
                'description' => '<p>نستخدم رافعات ومعدات احترافية مع مواد مانعة لتجمع الغبار والبقع المائية، لمنح واجهات المباني والمنازل بريقاً جذاباً يدوم لفترات طويلة.</p>',
                'status' => true,
                'order' => 4,
            ],
            [
                'title' => 'تنظيف ما بعد التشطيب',
                'slug' => 'post-construction-cleaning',
                'icon' => 'fa-solid fa-hammer',
                'image' => null,
                'short_description' => 'نزيل غبار الأسمنت وبقايا الدهانات واللاصق والجبس ليكون المكان جاهزاً ومثالياً للسكن المباشر.',
                'description' => '<p>التشطيبات تترك مخلفات صعبة الإزالة من دهان وأسمنت، طاقمنا مجهز بمكاشط ومواد خاصة لإزالة أصعب البقايا دون خدش السيراميك أو الرخام أو النوافذ.</p>',
                'status' => true,
                'order' => 5,
            ],
            [
                'title' => 'تعقيم وتطهير المطابخ والحمامات',
                'slug' => 'kitchen-bathroom-sanitization',
                'icon' => 'fa-solid fa-fire-flame-curved',
                'image' => null,
                'short_description' => 'إزالة الدهون المستعصية والجير والعفن من الأسطح والفواصل مع تعقيم بالبخار الحار ضد الميكروبات.',
                'description' => '<p>نركز على أدق التفاصيل لفك الدهون المتراكمة على الشفاطات والبوتاجازات، وتلميع وتطهير السيراميك والأحواض بمطهرات طبية فعالة تدوم طويلاً.</p>',
                'status' => true,
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }
    }
}
