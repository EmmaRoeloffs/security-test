{{-- resources/views/posts/show.blade.php --}}
<x-app-layout>


  <article class="prose max-w-none">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
  </article>

  <section class="mt-8">
    <h2 class="text-lg font-semibold">Add a comment</h2>
    @include('comments.form', ['post' => $post])
  </section>


  <section class="mt-8">
    <h2 class="text-lg font-semibold">Comments ({{ $post->comments->count() }})</h2>
    @include('comments.list', ['post' => $post])
  </section>
</x-app-layout>

