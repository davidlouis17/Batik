<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class NewsletterSubscriber extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'email',
        'name',
        'phone',
        'status',
        'subscribed_at',
        'unsubscribed_at',
        'preferences',
        'source',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'unsubscribed_at' => 'datetime',
        'preferences' => 'array',
    ];

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeUnsubscribed($query)
    {
        return $query->where('status', 'unsubscribed');
    }

    public function scopeBounced($query)
    {
        return $query->where('status', 'bounced');
    }

    // Accessors
    public function getIsActiveAttribute()
    {
        return $this->status === 'active';
    }

    public function getIsUnsubscribedAttribute()
    {
        return $this->status === 'unsubscribed';
    }

    public function getIsBouncedAttribute()
    {
        return $this->status === 'bounced';
    }

    // Methods
    public function subscribe()
    {
        $this->update([
            'status' => 'active',
            'subscribed_at' => now(),
            'unsubscribed_at' => null,
        ]);
    }

    public function unsubscribe()
    {
        $this->update([
            'status' => 'unsubscribed',
            'unsubscribed_at' => now(),
        ]);
    }

    public function markAsBounced()
    {
        $this->update(['status' => 'bounced']);
    }

    // Route notifications
    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }

    // Static methods
    public static function subscribeUser($email, $name = null, $source = 'website')
    {
        return static::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'status' => 'active',
                'subscribed_at' => now(),
                'source' => $source,
            ]
        );
    }

    public static function getActiveCount()
    {
        return static::active()->count();
    }

    public static function getTotalCount()
    {
        return static::count();
    }
}