<a href="{{ url('/posts/create') }}">New post</a>
<form method="GET" action="/search"><input name="q" placeholder="search"><button>Go</button></form>
@foreach($posts as $p)
  <article>
    <h3>{{ $p->title }}</h3>
    <p>{{ Str::limit($p->body,140) }}</p>
  </article>
@endforeach
