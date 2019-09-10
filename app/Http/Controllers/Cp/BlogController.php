<?php

namespace App\Http\Controllers\Cp;

use App\Http\Requests\BlogPostEditorRequest;
use App\Services\BlogService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;

        $this->middleware('auth');
    }

    public function getList()
    {
        return view('cp.blog.list', [
            'posts' => $this->blogService->getPosts(false)
        ]);
    }

    public function getNewPost()
    {
        return view('cp.blog.editor', [
            'mode' => 'add',
            'post' => null
        ]);
    }

    public function getEditPost($uuid)
    {
        $post = $this->blogService->findByUuid($uuid);

        if (is_null($post)) {
            return redirect('/cp/blog');
        }

        return view('cp.blog.editor', [
            'mode'=> 'edit',
            'post' => $post
        ]);
    }


    public function postEditPost(BlogPostEditorRequest $request)
    {
        $post = null;

        if ($request->post('mode') == 'edit') {
            // Check service block exists
            $post = $this->blogService->findByUuid($request->post('uuid'));

            if (is_null($post)) {
                return response()->json([
                    'errors' => ['Post not found']
                ], 404);
            }
        }

        // Upsert service block
        $block = $this->blogService->upsertPost(
            $request->post('title'),
            $request->post('summary'),
            $request->post('content'),
            $request->post('published'),
            $request->post('metaDescription'),
            $post
        );

        return response()->json([
            'location' => '/cp/blog'
        ]);
    }

    public function deletePost($uuid)
    {
        return $this->blogService->delete($uuid);
    }
}
