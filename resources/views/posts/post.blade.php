<!-- Blog Post -->

<h2>
    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
</h2>

<p class="lead">
    by <a href="#">{{ $post->user->login }}</a>
</p>

<p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>

<hr>

<img class="img-responsive" src="/img/posts/{{ $post->image }}" alt="">

<hr>

<p>{!! substr($post->text, 3, 400) !!}...</p>
<a class="btn btn-primary" href="/posts/{{ $post->id }}">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

<hr>