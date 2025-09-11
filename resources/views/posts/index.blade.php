<<<<<<< Updated upstream
<a href="{{ url('/posts/create') }}">New post</a>
<form method="GET" action="/search"><input name="q" placeholder="search"><button>Go</button></form>
@foreach($posts as $p)
  <article>
    <h3>{{ $p->title }}</h3>
    <p>{{ Str::limit($p->body,140) }}</p>
  </article>
@endforeach
=======
<x-app-layout>
  <div class="mx-auto max-w-5xl p-6">
    <div class="flex justify-between items-center mb-6">
      <form method="GET" action="{{ route('search') }}" class="flex-1 mr-4">
        <div class="flex">
          <input name="q" value="{{ request('q') }}" placeholder="Search posts..."
                 class="w-full border rounded-l px-3 py-2">
          <button class="px-4 py-2 border rounded-r bg-gray-50">Go</button>
        </div>
      </form>
      @auth
        <a href="{{ route('posts.create') }}"
           class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">
          + New Post
        </a>
      @endauth
    </div>

    <div class="grid gap-4">
      @forelse($posts as $p)
        <article class="rounded-lg border p-4 bg-white">
          <h3 class="text-lg font-semibold">{{ $p->title }}</h3>
          <p class="text-sm text-gray-700 mt-1">{{ \Illuminate\Support\Str::limit($p->body,160) }}</p>
          <div class="mt-3 text-xs text-gray-500 flex justify-between">
            <span>by {{ $p->user->name ?? 'user' }}</span>
            <a href="{{ route('posts.show',$p) }}" class="text-indigo-600 hover:underline">Read</a>
          </div>
        </article>
      @empty
        <p class="text-gray-600">No posts yet.</p>
      @endforelse
    </div>

    <div class="mt-6">{{ $posts->links() }}</div>
  </div>
</x-app-layout>
>>>>>>> Stashed changes
