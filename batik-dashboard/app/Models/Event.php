<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'event_date',
        'end_date',
        'location',
        'venue',
        'image',
        'gallery_images',
        'registration_link',
        'ticket_price',
        'max_participants',
        'status',
        'is_featured',
        'is_active',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'event_date' => 'datetime',
        'end_date' => 'datetime',
        'ticket_price' => 'decimal:2',
        'max_participants' => 'integer',
        'sort_order' => 'integer',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'gallery_images' => 'array',
    ];

    // Automatically generate slug from title
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });

        static::updating(function ($event) {
            if ($event->isDirty('title') && empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', 'upcoming')
                    ->where('event_date', '>', now());
    }

    public function scopePast($query)
    {
        return $query->where('event_date', '<', now());
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('event_date')->orderBy('sort_order');
    }

    // Accessors
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : asset('images/placeholder-event.jpg');
    }

    public function getGalleryImageUrlsAttribute()
    {
        if (!$this->gallery_images) {
            return [];
        }

        return array_map(function ($image) {
            return asset('storage/' . $image);
        }, $this->gallery_images);
    }

    public function getFormattedTicketPriceAttribute()
    {
        return $this->ticket_price ? 'Rp ' . number_format($this->ticket_price, 0, ',', '.') : 'Gratis';
    }

    public function getFormattedEventDateAttribute()
    {
        return $this->event_date->format('d F Y');
    }

    public function getFormattedEventTimeAttribute()
    {
        return $this->event_date->format('H:i');
    }

    public function getIsUpcomingAttribute()
    {
        return $this->event_date > now() && $this->status === 'upcoming';
    }

    public function getIsOngoingAttribute()
    {
        return $this->status === 'ongoing';
    }

    public function getIsCompletedAttribute()
    {
        return $this->event_date < now() || $this->status === 'completed';
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'upcoming' => 'secondary',
            'ongoing' => 'success',
            'completed' => 'primary',
            'cancelled' => 'danger',
            default => 'secondary'
        };
    }
}