<a href="{{route('home')}}">Home</a> -
@if(!Auth::guard('web')->user())
  <a href="{{route('login')}}">Login</a> -
  <a href="{{route('registration')}}">Registration</a> 
@else 
  <a href="{{route('dashboard')}}">Dashboard</a> -  
  <a href="{{route('logout')}}">Logout</a> 
@endif
