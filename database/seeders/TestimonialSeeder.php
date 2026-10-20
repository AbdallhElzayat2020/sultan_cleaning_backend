<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'أبو عبد الرحمن الشمري',
                'city' => 'جده - حي النرجس',
                'rating' => 5,
                'review' => 'طلبت تنظيف فيلا وجلي رخام، الشغل احترافي جداً والرخام صار كأنه مراية والعمالة في قمة الأدب والاحترام. والخصم كان ممتاز وسرعة في الإنجاز!',
                'avatar' => null,
                'status' => true,
                'order' => 1,
            ],
            [
                'name' => 'سارة القحطاني',
                'city' => 'جده - حي الياسمين',
                'rating' => 5,
                'review' => 'غسيل الكنب والمجالس بالبخار عندهم ممتاز جداً، البقع الصعبة كلها راحت ورائحة التعقيم تجنن وتجفيف سريع بنفس اليوم. تجربة ممتازة وسأكررها بكل تأكيد.',
                'avatar' => null,
                'status' => true,
                'order' => 2,
            ],
            [
                'name' => 'م. فهد الغامدي',
                'city' => 'جده - حي الملقا',
                'rating' => 5,
                'review' => 'خدمة تنظيف الخزان الأرضي والعلوي مع التعقيم كانت ممتازة وسريعة، صوروا لي الخزان قبل وبعد وشغل أمانة وإتقان حقيقي وشهادة ضمان.',
                'avatar' => null,
                'status' => true,
                'order' => 3,
            ],
            [
                'name' => 'أم تركي الدوسري',
                'city' => 'جده - حي حطين',
                'rating' => 5,
                'review' => 'ما شاء الله تبارك الله، طلبت تنظيف ما بعد التشطيب للفيلا كاملة، شباب سعوديين يشرفون على العمال والأجهزة حديثة جداً. النتيجة فوق المتوقع.',
                'avatar' => null,
                'status' => true,
                'order' => 4,
            ],
            [
                'name' => 'عبد العزيز السبيعي',
                'city' => 'جده - حي الصحافة',
                'rating' => 5,
                'review' => 'التزام بالمواعيد بالدقيقة، وأسعارهم منافسة جداً مقارنة بالجودة العالية للمواد الإيطالية اللي يستخدمونها في جلي وتلميع الأرضيات.',
                'avatar' => null,
                'status' => true,
                'order' => 5,
            ],
            [
                'name' => 'د. نورة المطيري',
                'city' => 'جده - حي العقيق',
                'rating' => 5,
                'review' => 'خدمة مكافحة الحشرات ورش المبيدات آمنة وبدون أي رائحة، ومتابعة وضمان مستمر. شكراً لفريق سلطان كلين على الاحترافية والاهتمام.',
                'avatar' => null,
                'status' => true,
                'order' => 6,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['name' => $testimonial['name'], 'city' => $testimonial['city']],
                $testimonial
            );
        }
    }
}
