<?php include('includes/header-user-executive.php'); ?>

<div class="content-wrapper user-order-checkout clearfix">
    
<div class="menutrigger">
<div class="bar1"></div>
<div class="bar2"></div>
<div class="bar3"></div>
</div>
    
<nav id="main-navigation" class="main-navigation">
<ul class="list-unstyled">
<li><a href="user-view-product.php">View Product</a></li>		    
<li><a href="user-view-orders.php">View Orders</a></li>
</ul>
</nav>   
    
<div class="main-content-wrapper">
<h2 class="heading">Order Checkout</h2>

<div class="customer-details-wrapper">
    <form class="customer-details-form">
<div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail4">Customer Name</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Customer Name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">GST Number</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Customer Name">
    </div>
  </div>
<div class="form-group">
    <label for="inputAddress">Address</label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Customer Address"></textarea>
  </div>   
</form> 
</div>

<div class="view-order-wrapper">
<h2 class="heading">Order Details</h2>    

<table class="user-order-checkout-table">
    <thead>
    <th class="article-number">Article No.</th>
    <th class="size">Size</th>
    <th class="quantity">Quantity</th>
    <th class="price">Price</th>
    <th class="action"></th>
    </thead>
    <tbody>
    <tr>
    <td class="article-number">A101</td> 
    <td class="size">6</td> 
    <td class="quantity">12</td> 
    <td class="price">5000</td> 
    <td class="action"><i class="fa fa-close remove"></i></td> 
    </tr>   
    </tbody>
    <tfoot>
    <tr>
    <td colspan="3" class="total-label">Total</td>
    <td class="total-value">5000</td>
    </tr>
    </tfoot>
</table>


    
<button class="update-button btn btn-primary red-button" type="submit">Place Order</button>   
</div>        
</div>


    
</div>    




<?php include('includes/footer-common.php'); ?>