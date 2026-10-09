<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'reading_time',
        'views',
        'status',
        'order',
        'published_at',
    ];

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
