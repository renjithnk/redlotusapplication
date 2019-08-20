<div class="content-wrapper admin-view-despatched clearfix">
    
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
<li><a href="<?php echo base_url();?>admin-view-despatched">View Despatched Orders</a></li>
</ul>
</nav>   
    
<div class="main-content-wrapper">
<h2 class="heading">View Despatched Orders</h2>




<div class="view-order-wrapper">
<table class="table table-striped view-orders-table">
    <thead>
      <tr>
        <th>Despatched On</th>
        <th>Article No.</th>
        <th>Customer Details</th>
        <th>Size</th>
        <th>Qty</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
<?php if($orders!='0')
{
    foreach ($orders as $key => $value) { 
        $price=$value->price*$value->product_quantity;
        ?>        
      <tr>
        <td><?php echo $value->despatched_on;?></td>
        <td><?php echo $value->article_number;?></td>
        <td>
            <table class="customer-infos">
                <tr>
                    <td>Name</td>
                    <td><div class="customer-name"><?php echo $value->name;?></div></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><div class="customer-address"><?php echo $value->address;?></div></td>
                </tr>
                <tr>
                    <td>GST</td>
                    <td><div class="gst-number"><?php echo $value->gst;?></div></td>
                </tr>
            </table>
        
        </td>
        <td><?php echo $value->size;?></td>
        <td><?php echo $value->product_quantity;?></td>
        <td><?php echo $price;?></td>
      </tr>
    <?php } } ?>      

    </tbody>
  </table>    
<div class="pagination-wrapper">
<?php echo $links; ?>   
</div>



</div>        
</div>
</div>    
