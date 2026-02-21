@include('nav')


<h3>Forget Password</h3>

<form action="" method="post">
   <div>Email Address</div>
   <div>
       <input type="email" name="email">
   </div>

    <div style="margin-top:10px;">
       <input type="submit" value="Submit">
       <br> 
       <a href="{{route('login')}}">Back to Login Page</a>
    </div>
</form>