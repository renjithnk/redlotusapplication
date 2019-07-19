<div class="content-wrapper admin-view-orders clearfix">
    
<div class="menutrigger">
<div class="bar1"></div>
<div class="bar2"></div>
<div class="bar3"></div>
</div>
<nav id="main-navigation" class="main-navigation">
<ul class="list-unstyled">
<li><a href="<?php echo base_url();?>admin-view-product">View Product</a></li>		    
<li><a href="<?php echo base_url();?>admin-add-product">Add Product</a></li>
<li><a href="<?php echo base_url();?>admin-view-orders">View Orders</a></li>
</ul>
</nav>   
    
<div class="main-content-wrapper">
<h2 class="heading">View Orders</h2>
<div class="view-order-wrapper">
<div class="view-order-th">
    <div>Article No.</div> 
    <div>Customer Details</div>
    <div>Size</div>
    <div>Qty</div>
    <div>Price</div>
</div>

<?php if($orders!='0')
{
    foreach ($orders as $key => $value) { 
        $price=$value->price*$value->product_quantity;
        ?>
        <div class="view-order-tbody">
        <div class="article-number"><?php echo $value->article_number;?></div>        
        <div class="customer-details">
            <div class="customer-name"><?php echo $value->name;?></div>
            <div class="customer-name"><?php echo $value->address;?></div>
            <div class="gst-number"><?php echo $value->gst;?></div>
        </div>  
        <div class="size"><?php echo $value->size;?></div>
        <div class="quantity"><?php echo $value->product_quantity;?></div>
        <div class="price"><?php echo $price;?></div>
        </div>
    <?php } } ?>
</div>        
</div>
</div>    
