<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title', 'slug', 'description',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function category()
    {
        $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

}
