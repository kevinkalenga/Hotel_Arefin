@include('nav')


<h3>Reset Password</h3>

<form action="{{route('Reset_password_submit', [$token, $email])}}" method="post">
   @csrf
   <div>New Password</div>
   <div>
       <input type="password" name="new_password">
   </div>
   
     <div>Retype Password</div>
   <div>
       <input type="password" name="retype_password">
   </div>

    <div style="margin-top:10px;">
       <input type="submit" value="Update">
    </div>
</form>