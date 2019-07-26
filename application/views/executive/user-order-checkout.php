
<div class="content-wrapper user-order-checkout clearfix">
    
<div class="menutrigger">
<div class="bar1"></div>
<div class="bar2"></div>
<div class="bar3"></div>
</div>
    
<nav id="main-navigation" class="main-navigation">
<ul class="list-unstyled">
<li><a href="user-categories">Categories</a></li>    
<li><a href="user-view-product">View Product</a></li>		    
<li><a href="user-view-orders">View Orders</a></li>
</ul>
</nav>   
    
<div class="main-content-wrapper">
<h2 class="heading">Order Checkout</h2>

<div class="customer-details-wrapper">
    <form class="customer-details-form">
<div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail4">Customer Name</label>
      <input type="text" class="form-control" id="name" placeholder="Customer Name">
    </div>
    <div class="form-group col-md-4">
      <label for="inputEmail4">GST Number</label>
      <input type="text" class="form-control" id="gst" placeholder="GST Number">
    </div>
  </div>
<div class="form-group">
    <label for="inputAddress">Address</label>
<textarea class="form-control" id="address" rows="3" placeholder="Customer Address"></textarea>
  </div>   
</form> 
</div>

<div class="view-order-wrapper">
<h2 class="heading">Order Details</h2>    

<table class="table table-striped view-orders-table user-order-checkout-table">
    <thead>
    <th class="article-number">Article No.</th>
    <th class="size">Size</th>
    <th class="quantity">Quantity</th>
    <th class="price">Price</th>
    <th class="action"></th>
    </thead>
    <tbody>

    <?php 
    $total=0;
    if($cart_items!=0)
    {
      foreach($cart_items as $key =>$value) { 

        $price=$value->product_quantity*$value->price;
        $total=$total+$price;
        ?>
        <tr id="<?=$value->cart_id;?>">
        <td class="article-number"><?=$value->article_number;?></td> 
        <td class="size"><?=$value->size;?></td> 
        <td class="quantity"><?=$value->product_quantity;?></td> 
        <td class="price"><?=$price;?></td> 
        <td class="action"><i class="fa fa-close remove" onclick="deleteCart(<?php echo $value->cart_id;?>,<?php echo $price;?>)"></i></td> 
        </tr>
    <?php }   
    }?>
    
    </tbody>
    <tfoot>
    <tr>
    <td colspan="3" class="total-label">Total</td>
    <td class="total-value"><span class="stock-number" id="total"><?=$total;?></span></td>
    </tr>
    </tfoot>
</table>


    
<button class="update-button btn btn-primary red-button" type="submit" onclick="placeOrder()">Place Order</button>   
</div>        
</div>


    
</div>    