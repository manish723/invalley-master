<?php

namespace App\Http\Middleware;

use App\Models\BlogPost;
use Closure;

class RecentBlogList
{
    public function handle($request, Closure $next)
    {
        // Get recent blog posts
        $posts = BlogPost::isPublished()->orderBy('post_date_at', 'desc')->take(3)->get();

        $request->attributes->add(['recentBlogPosts' => $posts]);

        return $next($request);
    }
}
