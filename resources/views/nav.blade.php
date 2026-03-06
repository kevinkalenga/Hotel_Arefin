<a href="{{ route('home') }}">Home</a> -

@guest
    <a href="{{ route('login') }}">Login</a> -
    <a href="{{ route('registration') }}">Registration</a>
@endguest

@auth
    @if(auth()->user()->role == 2)
        <a href="{{ route('dashboard_user') }}">Dashboard</a> -
    @endif

    @if(auth()->user()->role == 1)
        <a href="{{ route('dashboard_admin') }}">Dashboard</a> -
        <a href="{{ route('settings') }}">Settings</a> -
    @endif

    <a href="{{ route('logout') }}">Logout</a>
@endauth
