<h2>Users</h2>
<ul>
  @foreach($users as $user)
    <li>{{ $user->id }} — {{ $user->email }} — {{ $user->role }}</li>
  @endforeach
</ul>

{{-- Broken Acces Control --}}
