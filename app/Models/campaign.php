<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Campaign extends Model
{
    protected $fillable = [
        'title',
        'description',
        'target_donation',
        'collected_donation',
        'deadline',
    ];

    protected function casts(): array
    {
        return [
            'target_donation' => 'decimal:2',
            'collected_donation' => 'decimal:2',
            'deadline' => 'date',
        ];
    }

    // Relasi One-to-One: satu campaign memiliki satu rekening pencairan
    public function account(): HasOne
    {
        return $this->hasOne(CampaignAccount::class);
    }

    // Relasi One-to-Many: satu campaign memiliki banyak donasi
    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }

    // Relasi Many-to-Many: satu campaign bisa memiliki banyak kategori
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'campaign_category');
    }
}
