<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'status',
        'order',
    ];

    protected $casts = [
        'status' => 'boolean',
        'order' => 'integer',
    ];

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

        return asset('images/villa.jpg');
    }
}
