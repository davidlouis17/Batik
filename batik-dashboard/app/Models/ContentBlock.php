<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentBlock extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'block_key',
        'title',
        'content',
        'subtitle',
        'image',
        'button_text',
        'button_url',
        'button_style',
        'additional_data',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'additional_data' => 'array',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeSection($query, $section)
    {
        return $query->where('section', $section);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function getButtonStyleClassAttribute()
    {
        return match($this->button_style) {
            'primary' => 'btn-primary',
            'secondary' => 'btn-secondary',
            'outline' => 'btn-outline-primary',
            default => 'btn-primary'
        };
    }

    // Static methods for easy access
    public static function getBlock($key)
    {
        return static::where('block_key', $key)->active()->first();
    }

    public static function getSectionBlocks($section)
    {
        return static::section($section)->active()->ordered()->get();
    }
}