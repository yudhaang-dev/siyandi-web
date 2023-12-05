<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mews\Purifier\Casts\CleanHtml;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    protected $casts = [
        'content'       => CleanHtml::class,
        'published_at'  => 'datetime:Y-m-d H:i',
    ];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => !empty($value) ? (Storage::disk('public')->exists($value) 
                ? asset('storage/' . $value) 
                : 'https://placehold.co/600x400') : null,
        );
    }
}
