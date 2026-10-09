<?php

namespace App\Models;

use Database\Factories\GalleryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /** @use HasFactory<GalleryFactory> */
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'title',
        'category',
        'category_icon',
        'location',
        'image',
        'description',
        'status',
        'order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get image URL with fallback.
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            if (str_starts_with($this->image, 'http')) {
                return $this->image;
            }
            if (file_exists(public_path('uploads/galleries/'.$this->image))) {
                return asset('uploads/galleries/'.$this->image);
            }
            if (file_exists(public_path($this->image))) {
                return asset($this->image);
            }
        }

        return asset('assets/frontend/images/villa.jpg');
    }
}
