@include('nav')


<h3>Login</h3>

<form action="" method="post">
   <div>Email Address</div>
   <div>
       <input type="email" name="email">
   </div>

   <div>Password</div>
   <div>
      <input type="password" name="password">
   </div>

    <div style="margin-top:10px;">
       <input type="submit" value="Login">
       <br> 
       <a href="{{route('forget_password')}}">Forget Password</a>
    </div>
</form>