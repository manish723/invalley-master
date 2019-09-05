@forelse(app('request')->get('recentBlogPosts') as $recentBlogPost)
    <a class="more-link" href="/blog/post/{{ $recentBlogPost->slug_year }}/{{ $recentBlogPost->slug_month }}/{{ $recentBlogPost->slug }}">{{ $recentBlogPost->title }}</a>
@empty

@endforelse

<a class="btn btn-neutral btn-simple mt-3 mb-5 mb-md-0 rounded-0" href="index.html">Discover</a>