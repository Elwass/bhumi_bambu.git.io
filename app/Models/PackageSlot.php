<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PackageSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'date',
        'quota',
        'booked_count',
        'is_open',
    ];

    protected $casts = [
        'date' => 'date',
        'is_open' => 'boolean',
    ];

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
