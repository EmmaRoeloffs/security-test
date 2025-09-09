<h2>{{ $post->title }}</h2>
<p>{{ $post->body }}</p>

<h3>Comments</h3>
<ul>
 @foreach($post->comments as $c)
   {{-- will toggle XSS encoding in step 2 --}}
   <li>{!! $c->body !!} by {{ $c->user->email }}</li>
 @endforeach
</ul>

<form method="POST" action="/comments">
  @csrf
  <input type="hidden" name="post_id" value="{{ $post->id }}">
  <textarea name="body" required></textarea>
  <button type="submit">Comment</button>
</form>