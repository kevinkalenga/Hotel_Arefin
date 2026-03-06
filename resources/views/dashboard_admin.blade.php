@include('nav')


<h3>Dashboard - Admin</h3>
<p>Hi {{Auth::guard('web')->user()->name}}, Welcome to dashboard!</p>