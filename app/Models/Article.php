<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Tag;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles'; 

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
