<div class="content-wrapper admin-view-orders clearfix">
    
<div class="menutrigger">
<div class="bar1"></div>
<div class="bar2"></div>
<div class="bar3"></div>
</div>

<?php $this->view('includes/admin-navigation'); ?>       
    
<div class="main-content-wrapper">
<h2 class="heading">View Orders</h2>

<div class="view-order-wrapper"  style="overflow-x:auto;">
<table class="table table-striped view-orders-table">
    <thead>
      <tr>
        <th>Article No.</th>
        <th>Customer Details</th>
        <th>Size</th>
        <th>Qty</th>
        <th>Price</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
<?php if($orders!='0')
{
    foreach ($orders as $key => $value) { 
        $price=$value->price*$value->product_quantity;
        ?>        
      <tr>
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
        <td> <button class="update-button btn btn-primary red-button" type="button" onclick="despatchStock(<?php echo $value->order_id; ?>)">Despatch</button></td>
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
