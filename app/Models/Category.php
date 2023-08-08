<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name', 'slug',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
