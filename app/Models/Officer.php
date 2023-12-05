<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Officer extends Model
{
    use HasFactory;

    protected function photo(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Storage::disk('public')->exists($value)
                ? asset('storage/' . $value) 
                : 'https://placehold.co/200',
        );
    }
}
