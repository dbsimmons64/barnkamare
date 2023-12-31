<?php

namespace App\Models;

use App\Models\Scopes\OrganisationScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organisation extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function nurseries(): HasMany
    {
        return $this->hasMany(Nursery::class);
    }

    
}
