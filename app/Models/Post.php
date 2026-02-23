<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);
        });
    }

    public function getFeedItemId()
    {
        return $this->id;
    }

    public function getFeedItemTitle()
    {
        return $this->title;
    }

    public function getFeedItemSummary()
    {
        return Str::limit($this->content, 200);
    }

    public function getFeedItemContent()
    {
        return $this->content;
    }

    public function getFeedItemUpdated()
    {
        return $this->updated_at;
    }

    public function getFeedItemLink()
    {
        return route('posts.show', $this->slug);
    }
    // Add this method to your Post model
    public static function getFeedItems()
    {
        return self::orderBy('created_at', 'desc')->limit(20)->get();
    }
}