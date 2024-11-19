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
        'cover',
        'tags',
        'abstract',
        'content',
        'slug',
        'is_featured',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'tags' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function blog_category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class);
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

    public function getExcerpt ()
    {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function getReadingTime ()
    {
        return round (str_word_count($this->body) / 250);
    }
}
