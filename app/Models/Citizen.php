<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravolt\Indonesia\Models\Village;

class Citizen extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nik',
        'username',
        'email',
        'password',
        'status',
        'name',
        'place_of_birth',
        'date_of_birth',
        'sex',
        'religion',
        'marital_status',
        'education',
        'job_status',
        'citizenship',
        'address',
        'village_code',
        'photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'date_of_birth'     => 'datetime',
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    protected $guard = 'portal';

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'village_code', 'code');
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'citizen_skill', 'citizen_id', 'skill_id');
    }
}
