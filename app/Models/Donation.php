<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Donation extends Model
{
    protected $fillable = [
        'campaign_id',
        'donor_name',
        'amount',
        'message',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }

    // Relasi kebalikan: donasi dikirim untuk satu campaign
    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }
}
