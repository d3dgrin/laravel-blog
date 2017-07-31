<!-- Blog Post -->

<h2>
    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
</h2>

<p class="lead">
    by <a href="/posts/author/{{ $post->user->username }}" {!! ($post->user->hasRole('admin')) ? 'style="color: red;"' : '' !!}>{{ $post->user->username }}</a>
</p>

<p><span class="glyphicon glyphicon-time"></span> Posted: {{ $post->created_at->diffForHumans() }} | <a href="/posts/{{ $post->slug }}/#disqus_thread">Comments</a></p>

<hr>

<img class="img-responsive" src="/img/posts/{{ $post->image }}" alt="">

<hr>

<div>{!! substr($post->text, 0, 300) !!}...</div>
<a class="btn btn-primary" href="/posts/{{ $post->slug }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>

<script id="dsq-count-scr" src="//laravel-blog-test.disqus.com/count.js" async></script>