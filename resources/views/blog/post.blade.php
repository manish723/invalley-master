@extends('layouts.main', [
    'pageTitle' => '',
    'pageClass' => 'home',
    'navItem' => ''
])

@section('content')
<div class="wrapper container header floatingOverHeader blog-post">
   <div class="col-sm-12 order-lg-1">
       <h1 class="mb-4 mb-lg-5 text-center">{{ $post->title }}</h1>

       <p><strong>Posted by {{ $post->author->name }} on {{ $post->post_date_at->format('F jS, Y') }}</strong></p>

       {!! $post->postContent->summary !!}
   </div>
</div>

<div class="w-divider skew-up text-center"></div>

<div class="section bg-neutral pt-5 blog-post">
    <div style="height: 10px;"></div>

    {!! $post->postContent->content !!}

    <div style="height: 50px;"></div>
</div>



@append