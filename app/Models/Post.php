<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'category_icon',
        'image',
        'short_description',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'reading_time',
        'views',
        'status',
        'order',
        'published_at',
    ];

    /**
     * Get smart SEO title with fallback.
     */
    public function getSeoTitleAttribute(): string
    {
        return ! empty($this->meta_title)
            ? $this->meta_title
            : $this->title.' | '.setting('site_name', 'سين ياء');
    }

    /**
     * Get smart SEO description with fallback.
     */
    public function getSeoDescriptionAttribute(): string
    {
        if (! empty($this->meta_description)) {
            return $this->meta_description;
        }

        if (! empty($this->short_description)) {
            return $this->short_description;
        }

        return Str::limit(strip_tags($this->content ?? ''), 160);
    }

    /**
     * Get smart SEO keywords with fallback.
     */
    public function getSeoKeywordsAttribute(): string
    {
        if (! empty($this->meta_keywords)) {
            return $this->meta_keywords;
        }

        $parts = array_filter([
            $this->title,
            $this->category,
            'نصائح تنظيف',
            'تعقيم بالرياض',
            setting('site_name', 'سين ياء'),
        ]);

        return implode(', ', $parts);
    }

    protected function casts(): array
    {
        return [
            'views' => 'integer',
            'status' => 'boolean',
            'order' => 'integer',
            'published_at' => 'date',
        ];
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            if (str_starts_with($this->image, 'http')) {
                return $this->image;
            }
            if (file_exists(public_path('uploads/posts/'.$this->image))) {
                return asset('uploads/posts/'.$this->image);
            }
            if (file_exists(public_path($this->image))) {
                return asset($this->image);
            }
        }

        return asset('assets/frontend/images/sofa.jpg');
    }
}
