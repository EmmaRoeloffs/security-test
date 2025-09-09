<h2>Users</h2>
<ul>
  @foreach($users as $u)
    <li>{{ $u->email }} — {{ $u->role }}</li>
  @endforeach
</ul>
