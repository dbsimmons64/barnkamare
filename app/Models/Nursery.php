<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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
}
