<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    /* protected $connection="mysql_second"; */

    protected $fillable = [
        'user_id',
        'blog_category_id',
        'title',
        'video',
        'cover',
        'tags',
        'abstract',
        'introduction',
        'objectives',
        'ilustrations',
        'content',
        'conclusions',
        'references',
        'slug',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'tags' => 'array',
        'objectives' => 'array',
        'ilustrations' => 'array',
        'references' => 'array',
        'conclusions' => 'array',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopePublished ($query)
    {
        $query->where('created_at', '<=', Carbon::now());
    }

    public function scopeFeatured ($query)
    {
        $query->where('is_featured', true);
    }

    public function scopeWithCategory ($query, string $category)
    {
        $query->whereHas('category', function ($query) use ($category) {
            $query->where('slug', $category);
        });
    }

    public function scopeLatestPost($query)
    {
        return $query->where('created_at', '<=', Carbon::now())->orderBy('created_at', 'desc')->first();
    }

    public function getExcerpt ()
    {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function getReadingTime ()
    {
        $mins = round (str_word_count($this->body) / 250);

        return ( $mins < 1) ? 1 : $mins;

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorite_posts')->withTimestamps();
    }

    public function favoritesCount()
    {
        return $this->favoritedByUsers()->count();
    }


}
