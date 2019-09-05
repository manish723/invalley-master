<?php

namespace App\Services;

use App\Models\BlogPost;
use App\Models\BlogPostContent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogService
{
    public function getPosts($publishedOnly = true)
    {
        if ($publishedOnly) {
            $posts = BlogPost::isPublished()->with('author')->get();
        } else {
            $posts = BlogPost::with('author')->get();
        }

        return $posts;
    }

    public function findByUuid($uuid)
    {
        $post = BlogPost::uuid($uuid)->with('postContent')->first();

        return $post;
    }

    public function upsertPost($title, $summary, $content, $published, $metaDescription = '', $post = null)
    {
        if (is_null($post)) {
            $post = new BlogPost();
            $post->uuid = (string) Str::uuid();

            $post->slug_month = date('m');
            $post->slug_year = date('Y');
            $post->slug = str_slug($title, '-');
            $post->author_id = Auth::id();

            $postContent = new BlogPostContent();
        } else {
            $postContent = $post->postContent;
        }

        $post->title = $title;
        $post->meta_description = $metaDescription;
        $post->published_at = now();
        $post->post_date_at = now();
        $post->f_published = $published;

        try {
            $post->save();
        } catch (\Exception $e) {
            return false;
        }

        $postContent->post_id = $post->id;
        $postContent->summary = $summary;
        $postContent->content = $content;

        try {
            $postContent->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return $post;
    }

    public function delete($uuid)
    {
        // Check post exists
        $post = BlogPost::uuid($uuid)->with('content')->first();

        if (is_null($post)) {
            return response()->json([
                'errors' => ['Post not found']
            ], 404);
        }

        $post->content->delete();
        $post->delete();

        return response()->json([
            'location' => '/cp/blog'
        ]);
    }

    public function postList($publishedOnly = true, $orderDir = 'desc')
    {
        $posts = BlogPost::published($publishedOnly)
            ->orderBy('published_at', $orderDir)
            ->get();

        return $posts;
    }

    public function post($slugYear, $slugMonth, $slug, $published = true)
    {
        $post = BlogPost::slugYear($slugYear)
            ->slugMonth($slugMonth)
            ->slug($slug)
            ->published($published)
            ->with('postContent')
            ->first();

        return $post;
    }
}