<ul>
  @foreach($post->comments()->latest()->with('user')->get() as $c)
    <li>{!! $c->body !!} — {{ optional($c->user)->name ?? 'anon' }}</li>
    {{-- unescaped unsafe --}}
    {{-- safe version: {{ $c->body }} — {{ $c->user->name ?? 'anon' }} --}}
    {{-- escaping makes the browser treat input as text, not HTML/JS --}}
  @endforeach
</ul>
