<h2>Create Post</h2>
<form method="POST" action="/posts">
  {{-- CSRF will be removed in step 3 before-fix --}}
  @csrf
  <input name="title" required>
  <textarea name="body" required></textarea>
  <button type="submit">Save</button>
</form>
