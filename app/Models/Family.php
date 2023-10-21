<?php

namespace App\Models;

use App\Models\Scopes\NurseryScope;
use App\Models\Scopes\OrganisationScope;
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

    protected static function booted(): void
    {
        static::addGlobalScope(new NurseryScope);
    }

    public function adults(): HasMany
    {
        return $this->hasMany(Adult::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Child::class);
    }
}
