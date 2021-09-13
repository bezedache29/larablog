<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image'];

    public static function boot()
    {
        parent::boot();

        // Pendant la création du post
        // On associe au post le user_id et la category_id
        self::creating(function ($post) {
            $post->user()->associate(auth()->user()->id);
            $post->category()->associate(request()->category);
        });

        // Pendant l'update du post
        self::updating(function ($post) {
            $post->category()->associate(request()->category);
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTitleAttribute($attribute)
    {
        // Permet de mettre la prenière lettre de chaque mot en majuscule
        return Str::title($attribute);
    }
}
