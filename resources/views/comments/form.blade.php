<form method="POST" action="/comments">
  {{-- GEEN @csrf (onveilig) --}}
  <input type="hidden" name="post_id" value="{{ $post->id }}">
  <textarea name="body" required placeholder="Say something"></textarea>
  <button type="submit">Comment</button>
</form>
