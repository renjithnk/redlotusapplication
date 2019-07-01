<div class="content-wrapper user-view-orders clearfix">
    
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
<h2 class="heading">View Orders</h2>
<div class="view-order-wrapper">



<table class="user-view-orders-table">
    <thead>
    <th class="article-number">Article No.</th>
    <th class="customer-details">Customer Details</th>    
    <th class="size">Size</th>
    <th class="quantity">Quantity</th>
    <th class="price">Price</th>
    </thead>
    <tbody>
    <?php 
    if($orders!=0)
    {
        foreach ($orders as $key => $value) { 
            $price=$value->product_quantity*$value->price;
            ?>
            <tr>
            <td class="article-number"><?=$value->article_number;?></td> 
            <td class="customer-details"><?=$value->address;?></td> 
            <td class="size"><?=$value->size;?></td> 
            <td class="quantity"><?=$value->product_quantity;?></td> 
            <td class="price"><?=$price;?></td> 
            </tr>
        <?php }
    }
    ?>   
    </tbody>
</table>

   
    
    
</div>        
</div>


    
</div>    
