<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    // Define relation ships
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
