<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // untuk membuat relasi antara post dengan category
    // hasMany : menunjukkan bahwa category hanya bisa dihubungkan dengan beberapa post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
