<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'name',
        'phone',
        'service_id',
        'service_name',
        'city',
        'notes',
        'status',
    ];

    /**
     * Relationship to Service model.
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * Get displayable service name.
     */
    public function getServiceNameDisplayAttribute(): string
    {
        return $this->service?->title ?? $this->service_name ?? 'طلب عام';
    }

    /**
     * Arabic status label.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'طلب جديد',
            'contacted' => 'تم التواصل',
            'completed' => 'مكتمل',
            'cancelled' => 'ملغي',
            default => $this->status,
        };
    }

    /**
     * Status Bootstrap badge class.
     */
    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'badge-warning',
            'contacted' => 'badge-info',
            'completed' => 'badge-success',
            'cancelled' => 'badge-danger',
            default => 'badge-secondary',
        };
    }

    /**
     * Formatted WhatsApp Link to chat with customer.
     */
    public function getWhatsappUrlAttribute(): string
    {
        $cleanPhone = preg_replace('/[^0-9]/', '', $this->phone);

        // Normalize Saudi numbers e.g. 05XXXXXXXX -> 9665XXXXXXXX
        if (str_starts_with($cleanPhone, '05')) {
            $cleanPhone = '966'.substr($cleanPhone, 1);
        } elseif (str_starts_with($cleanPhone, '5') && strlen($cleanPhone) === 9) {
            $cleanPhone = '966'.$cleanPhone;
        }

        $serviceTitle = $this->service_name_display;
        $message = urlencode("مرحباً أستاذ {$this->name}، بخصوص طلبك من سلطان كلين لخدمة ({$serviceTitle}) في {$this->city}.");

        return "https://wa.me/{$cleanPhone}?text={$message}";
    }
}
