<?php include('includes/header-administrator.php'); ?>

 

<div class="content-wrapper admin-add-product clearfix">
    
    
<div class="menutrigger">
<div class="bar1"></div>
<div class="bar2"></div>
<div class="bar3"></div>
</div>
    
    
<?php include('includes/admin-navigation.php'); ?>      
    
    
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
    <label for="exampleFormControlSelect1">Category</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Select</option>
      <option>Formal</option>
      <option>Casual</option>
      <option>Sandel</option>
      <option>Sleeper</option>
      <option>Loffer</option>
      <option>Roman bandu</option>
      <option>Bandu</option>   
    </select>
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