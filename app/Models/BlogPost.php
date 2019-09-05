<?php

namespace App\Models;

use App\Traits\ModelUuid;
use App\User;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use ModelUuid;

    protected $dates = [
        'post_date_at'
    ];

    public function scopeIsPublished($query)
    {
        return $query->where('f_published', true);
    }

    public function scopeSlugMonth($query, $slugMonth)
    {
        return $query->where('slug_month', $slugMonth);
    }

    public function scopeSlugYear($query, $slugYear)
    {
        return $query->where('slug_year', $slugYear);
    }

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }

    public function scopePublished($query, $published = true)
    {
        return $query->where('f_published', $published);
    }

    public function getPublishedStatusAttribute()
    {
        return $this->f_published ? 'Yes' : 'No';
    }

    public function getPublishedStatusClassAttribute()
    {
        return $this->f_published ? 'success' : 'danger';
    }

    public function postContent()
    {
        return $this->hasOne(BlogPostContent::class, 'post_id');
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
