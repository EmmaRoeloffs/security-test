<h2>Search</h2>
<form method="GET" action="{{ route('search') }}">
  <input name="q" placeholder="search">
  <button>Go</button>
</form>

<p>Query: {!! $q !!}</p> {{-- laat dit zo voor reflected XSS demo --}}

@forelse($posts as $p)
  <article><h4>{{ $p->title }}</h4><p>{{ \Illuminate\Support\Str::limit($p->body,120) }}</p></article>
@empty
  <p>No results.</p>
@endforelse
