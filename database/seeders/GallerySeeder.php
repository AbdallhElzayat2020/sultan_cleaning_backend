<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'جلي وتلميع رخام إيطالي بالكريستال وأقراص الألماس',
                'category' => 'جلي الرخام والأرضيات',
                'category_icon' => 'fa-solid fa-gem',
                'location' => 'حي الملقا - جده',
                'image' => 'assets/frontend/images/marble.jpg',
                'description' => 'رخام إيطالي كريستالي - جلي بأحدث أجهزة الكريستال وتلميع الفواصل بأقراص الألماس.',
                'status' => true,
                'order' => 1,
            ],
            [
                'title' => 'تنظيف وتعقيم فيلا فاخرة بعد أعمال التشطيب والدهان',
                'category' => 'تنظيف الفلل والقصور',
                'category_icon' => 'fa-solid fa-building',
                'location' => 'حي حطين - جده',
                'image' => 'assets/frontend/images/villa.jpg',
                'description' => 'فيلا دوبلكس كاملة - تنظيف شامل للأرضيات والواجهات والنوافذ وإزالة آثار الدهان والجبس.',
                'status' => true,
                'order' => 2,
            ],
            [
                'title' => 'غسيل كنب ومجالس مخمل بالبخار الحار وإزالة البقع العنيدة',
                'category' => 'غسيل الكنب والمجالس',
                'category_icon' => 'fa-solid fa-couch',
                'location' => 'حي النرجس - جده',
                'image' => 'assets/frontend/images/sofa.jpg',
                'description' => 'كنب ومجالس فخمة - إزالة البقع المستعصية والتعقيم الفوري بالبخار الحار والتعطير الفندقي.',
                'status' => true,
                'order' => 3,
            ],
            [
                'title' => 'غسيل سجاد وموكيت حريري بأحدث أجهزة الشفط وضغط البخار',
                'category' => 'غسيل السجاد والموكيت',
                'category_icon' => 'fa-solid fa-rug',
                'location' => 'حي الياسمين - جده',
                'image' => 'assets/frontend/images/carpet.jpg',
                'description' => 'سجاد وموكيت تركي - تنظيف عميق بدون التأثير على الأنسجة مع تجفيف سريع بالرغوة الجافة.',
                'status' => true,
                'order' => 4,
            ],
            [
                'title' => 'غسيل وتفريغ وتعقيم خزان مياه أرضي وعلوي بمواد معتمدة صحياً',
                'category' => 'تعقيم خزانات المياه',
                'category_icon' => 'fa-solid fa-droplet',
                'location' => 'حي الرمال - جده',
                'image' => 'assets/frontend/images/tank.jpg',
                'description' => 'خزانات مياه شرب - إزالة الطحالب والرواسب وتعقيم بمطهرات مرخصة من وزارة الصحة.',
                'status' => true,
                'order' => 5,
            ],
            [
                'title' => 'تنظيف وتعقيم دوري شامل لمقر شركة ومكاتب إدارية',
                'category' => 'تنظيف المكاتب والشركات',
                'category_icon' => 'fa-solid fa-briefcase',
                'location' => 'حي العليا - جده',
                'image' => 'assets/frontend/images/hero.jpg',
                'description' => 'مقرات ومكاتب شركات - تعقيم المكاتب والشاشات والواجهات الزجاجية وممرات الاستقبال.',
                'status' => true,
                'order' => 6,
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::updateOrCreate(
                ['title' => $gallery['title']],
                $gallery
            );
        }
    }
}
