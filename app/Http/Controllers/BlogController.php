<?php

namespace App\Http\Controllers;

use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function getPost($slugYear, $slugMonth, $slug)
    {
        // Get blog post from database
        $post = $this->blogService->post($slugYear, $slugMonth, $slug);

        if (is_null($post)) {
            abort(404);
        }

        return view('blog.post', [
            'post' => $post
        ]);
    }
}
