<ul>
  @foreach($post->comments()->latest()->with('user')->get() as $c)
    <li>{!! $c->body !!} — {{ optional($c->user)->email ?? 'anon' }}</li>
  @endforeach
</ul>
