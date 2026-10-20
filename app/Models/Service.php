<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'title',
        'slug',
        'icon',
        'image',
        'discount',
        'short_description',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'status',
        'order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer',
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

        return Str::limit(strip_tags($this->description ?? ''), 160);
    }

    /**
     * Get smart SEO keywords with fallback.
     */
    public function getSeoKeywordsAttribute(): string
    {
        if (! empty($this->meta_keywords)) {
            return $this->meta_keywords;
        }

        return $this->title.', تنظيف جدة, شركة تنظيف, تعقيم منازل, '.setting('site_name', 'سين ياء');
    }

    /**
     * Get the route key for the model (can use slug or id).
     */
    public function getRouteKeyName(): string
    {
        return 'id';
    }

    /**
     * Helper to get image URL with fallback.
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image && file_exists(public_path('uploads/services/'.$this->image))) {
            return asset('uploads/services/'.$this->image);
        }

        return asset('images/hero.jpg');
    }
}
