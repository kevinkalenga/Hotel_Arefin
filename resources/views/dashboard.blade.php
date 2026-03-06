@include('nav')


<h3>Dashboard</h3>
<p>Hi {{Auth::guard('web')->user()->name}}, Welcome to dashboard!</p>