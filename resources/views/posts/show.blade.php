@extends('layouts.master')

@section('title', 'Home')

@section('content')

<!-- Blog Post Content Column -->
<div class="col-lg-8">

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{ $post->title }}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{ $post->user->username }}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted on {{ $post->created_at }}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="/img/posts/{{ $post->image }}" alt="">

    <hr>

    <!-- Post Content -->
    <div>
        {!! $post->text !!}
    </div>
    
    <hr>

    <!-- Post Comments -->

    <div id="disqus_thread"></div>
    <script>

    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
    
    /*
    var disqus_config = function () {
    this.page.url = $_SERVER['REQUEST_URI'];  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = 'post_{{ $post->id }}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */

    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://laravel-blog-test.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

</div>

@endsection