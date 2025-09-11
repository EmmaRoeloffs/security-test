<<<<<<< Updated upstream
<h2>Create Post</h2>
<form method="POST" action="/posts">
  {{-- CSRF will be removed in step 3 before-fix --}}
  @csrf
  <input name="title" required>
  <textarea name="body" required></textarea>
  <button type="submit">Save</button>
</form>
=======
<x-app-layout>
  <div class="min-h-screen flex items-center justify-center bg-gray-50">
    <form method="POST" action="{{ route('posts.store') }}"
          class="bg-white p-6 rounded shadow w-full max-w-md space-y-4">
      @csrf
      <input name="title" required placeholder="Title"
             class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200">
      <textarea name="body" required rows="6" placeholder="Write your post..."
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200"></textarea>
      <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
        Save
      </button>
    </form>
  </div>
</x-app-layout>

>>>>>>> Stashed changes
