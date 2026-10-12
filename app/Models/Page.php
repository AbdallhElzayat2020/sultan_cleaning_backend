<?php

namespace App\Models;

use Database\Factories\PageFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /** @use HasFactory<PageFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'show_in_header',
        'show_in_footer',
        'order',
        'views',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'boolean',
            'show_in_header' => 'boolean',
            'show_in_footer' => 'boolean',
            'order' => 'integer',
            'views' => 'integer',
        ];
    }

    /**
     * Get the SEO title with fallback to page title and site name.
     */
    public function getSeoTitleAttribute(): string
    {
        if (! empty($this->meta_title)) {
            return $this->meta_title;
        }

        return $this->title.' | '.setting('site_name', 'سين ياء');
    }

    /**
     * Get the SEO description with fallback to excerpt or stripped content.
     */
    public function getSeoDescriptionAttribute(): string
    {
        if (! empty($this->meta_description)) {
            return $this->meta_description;
        }

        if (! empty($this->excerpt)) {
            return $this->excerpt;
        }

        $plainText = trim(preg_replace('/\s+/', ' ', strip_tags($this->content ?? '')));

        return mb_substr($plainText, 0, 160) ?: setting('meta_description', 'شركة سين ياء لخدمات النظافة والتعقيم الشامل.');
    }

    /**
     * Get SEO keywords with fallback.
     */
    public function getSeoKeywordsAttribute(): string
    {
        if (! empty($this->meta_keywords)) {
            return $this->meta_keywords;
        }

        $parts = array_filter([
            $this->title,
            'سين ياء',
            'خدمات تنظيف بالرياض',
            'شركة نظافة وتعقيم',
        ]);

        return implode(', ', $parts);
    }

    /**
     * Calculate estimated reading time in Arabic.
     */
    public function getReadingTimeAttribute(): string
    {
        $words = str_word_count(strip_tags($this->content ?? ''));
        $minutes = max(1, (int) ceil($words / 180));

        return $minutes.' دقائق قراءة';
    }
}
