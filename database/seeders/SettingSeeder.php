<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            'top_bar_active' => '1',
            'top_bar_badge' => '🎉 عرض حصري',
            'top_bar_discount' => '35%',
            'top_bar_text' => 'خصم خاص على جميع خدمات التنظيف والتعقيم الشامل!',
            'top_bar_phone' => '0531109831',
            'top_bar_whatsapp' => '966531109831',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    }
}
