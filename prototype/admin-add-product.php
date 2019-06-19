<?php include('includes/header-administrator.php'); ?>




 

<div class="content-wrapper admin-add-product clearfix">
    
    
<div class="menutrigger">
<div class="bar1"></div>
<div class="bar2"></div>
<div class="bar3"></div>
</div>
<nav id="main-navigation" class="main-navigation">
<ul class="list-unstyled">
<li><a href="admin-view-product.php">View Product</a></li>		    
<li><a href="admin-add-product.php">Add Product</a></li>
<li><a href="admin-view-orders.php">View Orders</a></li>
</ul>
</nav>     
    
    
<div class="main-content-wrapper">
<h2 class="heading">Add Products</h2>
    
<div class="add-products-wrapper">    
    
<div class="add-product-form">
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Article No.</label>
      <input type="text" class="form-control" id="articleno" placeholder="Article No">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Size</label>
      <input type="text" class="form-control" id="size" placeholder="Size">
    </div>
</div>    
    
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Price</label>
      <input type="text" class="form-control" id="email" placeholder="Price">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">No of Stock</label>
      <input type="text" class="form-control" id="numberofstock" placeholder="No of Stock">
    </div>
</div>     

<div class="form-group">
<label for="exampleInputEmail1">Upload</label>
<input type="file" class="form-control add-product-upload" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
</div>    
<button type="submit" class="btn btn-primary">Submit</button>         
</div>    
</div>    
</div>    
    

</div>    

 





<?php include('includes/footer-common.php'); ?>