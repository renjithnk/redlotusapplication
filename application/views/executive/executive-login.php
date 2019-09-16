<div class="login-box-wrapper">
<div class="login-box">
<a href="<?php echo base_url();?>">
<img class="logo img-fluid" src="../assets/images/logo.png" alt="" width="200" height="121"></a>
<h2 class="session-name">Executive Login</h2>
<form method="post" onsubmit="userLoginCheck();return false">
<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" class="form-control" id="user_email" aria-describedby="emailHelp" placeholder="Enter email">

</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" id="user_password" placeholder="Password">
</div>
<input type='submit' name='submit' value='Submit' class="btn btn-lg btn-primary btn-block" >    
<div id="error_messagess" style="display:none">
</div>   
</form>              
</div>
</div> 

