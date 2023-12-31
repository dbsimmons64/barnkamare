<?php

namespace App\Models;

use App\Models\Scopes\OrganisationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Nursery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address_line_1',
        'address_line_2',
        'town',
        'county',
        'postcode',
        'telephone',
        'organisation_id'
    ];

    public function scopeOrganisation(Builder $query): void
    {
        $query->where('organisation_id', Auth::user()->organisation_id);
    }

    protected static function booted(): void
    {
        static::addGlobalScope(new OrganisationScope);
    }

    public function families(): HasMany
    {
        return $this->hasMany(Family::class);
    }
}
