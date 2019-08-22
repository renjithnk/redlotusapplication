<!DOCTYPE html>
<html>
<head>
<title>Red Lotus :: Stock Management Application</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="alert/dist/sweetalert.css">  
<link href="<?php echo SERVER;?>assets/css/style.css" rel="stylesheet" type="text/css" />  
<link rel="stylesheet" href="<?php echo SERVER;?>assets/css/dropzone.min.css">
<script src="<?php echo SERVER;?>assets/js/script.js"></script> 

<script>
    var base_url_js = "<?php echo SERVER;?>";

</script>
</head>

<body>
  
<header class="site-header clearfix">
<div class="logo-container">
<a href="<?php echo base_url()?>">
<img class="img-fluid logo" src="<?php echo SERVER;?>assets/images/logo.png" alt="" width="85" height="50" />        
</a>    
</div> 
<div class="session-name">
Administrator
</div> 
    
<div class="input-group form-group search-box">
<span class="fa fa-search form-control-feedback"></span>    
<input type="text" class="form-control" id="seach_item" placeholder="Search Product">
<div class="input-group-append">
<button class="btn btn-secondary search-button" type="button" onclick="searchProducts()"><i class="fa fa-search"></i></button>
</div>
</div>
    
<a href="<?php echo base_url();?>admin-login" class="session-logout">
Logout
</a>     
    
</header>    
    
    
    
    
<!-- administrator session starts  -->
 

  


