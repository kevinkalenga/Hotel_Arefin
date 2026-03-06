@include('admin.nav')


<h3>Dashboard - Admin</h3>
<p>Hi {{Auth::guard('admin')->user()->name}}, Welcome to dashboard!</p>