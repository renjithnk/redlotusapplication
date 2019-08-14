<?php include('includes/header-common.php'); ?>

<div class="login-box-wrapper">
<div class="login-box">
<a href="index.php">
<img class="logo img-fluid" src="../assets/images/logo.png" alt="" width="200" height="121">        
</a>    
<h3 class="application-name">Executive Login</h3>
<form method="post" onsubmit="userLoginCheck();return false">
<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password</label>
<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
</div>
<a href="executive-main-categories.php" class="btn btn-lg btn-primary btn-block" >Submit</a>    
<div id="error_message">
</div>   
</form>              
</div>
</div> 

<?php include('includes/footer-common.php'); ?>