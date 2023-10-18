<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Family extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nursery_id'
    ];

    public function adults(): HasMany
    {
        return $this->hasMany(Adult::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Child::class);
    }
}
