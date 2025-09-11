<form method="POST" action="{{ route('comments.store') }}">
  @csrf
  <input type="hidden" name="post_id" value="{{ $post->id }}">
  <textarea name="body" required placeholder="Say something"></textarea>
  <button type="submit" class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">
    Comment
  </button>
</form>
