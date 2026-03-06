@include('nav')


<h3>Dashboard - User</h3>
<p>Hi {{Auth::guard('web')->user()->name}}, Welcome to dashboard!</p>