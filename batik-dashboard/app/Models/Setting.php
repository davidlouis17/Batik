<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'group',
        'label',
        'description',
        'options',
        'sort_order',
        'is_public',
    ];

    protected $casts = [
        'options' => 'array',
        'sort_order' => 'integer',
        'is_public' => 'boolean',
    ];

    // Scopes
    public function scopeGroup($query, $group)
    {
        return $query->where('group', $group);
    }

    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('group')->orderBy('key');
    }

    // Static methods for easy access
    public static function get($key, $default = null)
    {
        $cacheKey = "setting_{$key}";

        return Cache::remember($cacheKey, 3600, function () use ($key, $default) {
            $setting = static::where('key', $key)->first();
            return $setting ? self::castValue($setting->value, $setting->type) : $default;
        });
    }

    public static function set($key, $value, $type = 'string', $group = 'general')
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'group' => $group,
            ]
        );

        // Clear cache
        Cache::forget("setting_{$key}");

        return $setting;
    }

    public static function getGroup($group)
    {
        $cacheKey = "settings_group_{$group}";

        return Cache::remember($cacheKey, 3600, function () use ($group) {
            return static::group($group)->get()->mapWithKeys(function ($setting) {
                return [$setting->key => self::castValue($setting->value, $setting->type)];
            });
        });
    }

    // Helper method to cast values based on type
    private static function castValue($value, $type)
    {
        return match($type) {
            'boolean' => (bool) $value,
            'integer' => (int) $value,
            'float', 'decimal' => (float) $value,
            'json' => json_decode($value, true),
            'array' => json_decode($value, true) ?? [],
            default => $value
        };
    }

    // Clear all settings cache
    public static function clearCache()
    {
        $settings = static::all();
        foreach ($settings as $setting) {
            Cache::forget("setting_{$setting->key}");
        }
        Cache::forget("settings_all");
    }

    // Get all settings as array
    public static function allAsArray()
    {
        $cacheKey = "settings_all";

        return Cache::remember($cacheKey, 3600, function () {
            return static::all()->mapWithKeys(function ($setting) {
                return [$setting->key => self::castValue($setting->value, $setting->type)];
            })->toArray();
        });
    }
}