<!DOCTYPE html>
<html>
<head>
<title>Red Lotus :: Stock Management Application</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="alert/dist/sweetalert.css">  
<link href="<?php echo SERVER;?>assets/css/style.css" rel="stylesheet" type="text/css" />   
</head>

<body>
<header class="site-header clearfix">
<div class="logo-container">
<a href="<?php echo base_url()?>">
<img class="img-fluid logo" src="<?php echo SERVER;?>assets/images/logo.png" alt="" width="85" height="50" />        
</a>    
</div> 
<div class="session-name">User Executive</div> 
    
<div class="input-group form-group search-box">
<span class="fa fa-search form-control-feedback"></span>    
<input type="text" id="seach_item" class="form-control" placeholder="Search Product">
<div class="input-group-append">
<button class="btn btn-secondary search-button" type="button" onclick="searchProduct()"><i class="fa fa-search"></i></button>
</div>
</div>
 
<div class="order-header-wrapper">
<a href="user-order-checkout">    
<div class="order-label">Order</div>    
<div class="order-total-value" id="cart_item_count">0</div>
</a>
</div>

<a href="<?php echo base_url();?>" class="session-logout">
Logout
</a>     
    
</header>    
    
    
    
    
<!-- administrator session starts  -->