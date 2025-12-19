<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'description',
        'price',
        'duration',
        'location',
        'facilities',
        'thumbnail',
        'is_active',
    ];

    protected static function booted(): void
    {
        static::creating(function (self $package): void {
            if (empty($package->slug)) {
                $package->slug = Str::slug($package->title);
            }
        });
    }

    public function slots(): HasMany
    {
        return $this->hasMany(PackageSlot::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
