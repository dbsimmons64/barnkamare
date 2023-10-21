<?php

namespace App\Models;

use App\Models\Scopes\NurseryScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'family_id',
        'nursery_id'
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(new NurseryScope);
    }

    public function family(): BelongsTo
    {
        return $this->belongsTo(Family::class);
    }
}
