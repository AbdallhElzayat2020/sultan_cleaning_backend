<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'key',
        'value',
    ];

    /**
     * Cache key for all site settings.
     */
    public const CACHE_KEY = 'site_settings';

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::saved(function () {
            self::clearCache();
        });

        static::deleted(function () {
            self::clearCache();
        });
    }

    /**
     * Get all cached settings.
     *
     * @return array<string, mixed>
     */
    public static function getAllSettings(): array
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            return self::pluck('value', 'key')->toArray();
        });
    }

    /**
     * Get a setting by key.
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $settings = self::getAllSettings();

        return $settings[$key] ?? $default;
    }

    /**
     * Set a setting value.
     */
    public static function set(string $key, mixed $value): void
    {
        self::updateOrCreate(['key' => $key], ['value' => $value]);
        self::clearCache();
    }

    /**
     * Clear the settings cache.
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
