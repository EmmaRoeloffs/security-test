<h2>{{ $post->title }}</h2>
<p>{{ $post->body }}</p>

<h3>Comments</h3>
<ul>
 @foreach($post->comments as $c)
   {{-- kwetsbaar XSS: geen escaping --}}
   <li>{!! $c->body !!} by {{ $c->user->email }}</li>
 @endforeach
</ul>

<form method="POST" action="/comments">
  {{-- CSRF aanval --}}
  <input type="hidden" name="post_id" value="{{ $post->id }}">
  <textarea name="body" required></textarea>
  <button type="submit">Comment</button>
</form>
