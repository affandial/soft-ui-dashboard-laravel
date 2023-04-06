
@if (auth()->guard('teacher')->check())
  <p>Selamat datang, user guard teacher</p>
@else
  {{ redirect()->route('login') }}
@endif

