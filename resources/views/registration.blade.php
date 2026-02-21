@include('nav')


<h3>Registration</h3>

<form action="" method="post">
   
   <div>Name</div>
   <div>
       <input type="text" name="name">
   </div>
   <div>Email Address</div>
   <div>
       <input type="email" name="email">
   </div>

   <div>Password</div>
   <div>
      <input type="password" name="password">
   </div>
   <div>Retype Password</div>
   <div>
      <input type="password" name="retype_password">
   </div>

    <div style="margin-top:10px;">
       <input type="submit" value="Make Registration">
    </div>
</form>