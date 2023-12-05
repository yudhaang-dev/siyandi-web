<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostType extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'slug';
    protected $fillable = ['name', 'meta'];
    protected $casts = [
        'meta' => 'object',
    ];

    public function posts(): HasMany {
        return $this->hasMany(Post::class, 'type_slug', 'slug');
    }

    public function categories(): HasMany {
        return $this->hasMany(PostCategory::class, 'type_slug', 'slug');
    }
}
