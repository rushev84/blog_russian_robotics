<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'url', 'description',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function items()
    {
        return $this->belongsToMany(Post::class);
    }
}
