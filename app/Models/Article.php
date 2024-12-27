<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'excerpt', 'content', 'image', 'published_at', 'user_id'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
     
    public function isNew()
    {
        return $this->created_at->greaterThan(now()->subDay());
    }

    
    // Relation many-to-many avec les catégories
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'article_category');
    }
     
    public function category()
    {
        return $this->belongsTo(Category::class); 
    }
    


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



   
}
