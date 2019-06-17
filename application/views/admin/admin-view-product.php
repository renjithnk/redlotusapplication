
<div class="content-wrapper admin-dashboard clearfix">
    
<div class="menutrigger">
<div class="bar1"></div>
<div class="bar2"></div>
<div class="bar3"></div>
</div>
  
<nav id="main-navigation" class="main-navigation">
<ul class="list-unstyled">
<li><a href="admin-dashboard.php">Dashboard</a></li>
<li><a href="admin-add-product">Add Product</a></li>
<li><a href="admin-view-product">View Product</a></li>		
</ul>
</nav>    
 
<div class="main-content-wrapper">
    
    
    
<div class="product-list-wrapper">
<ul class="list-unstyled">

	<?php 

	foreach($product as $key =>$value)
{ $stock=0;
$pending=0; ?>

	<li class="product-list">
	<div class="product-details-wrapper">
	<div class="col1">
	<h2 class="article-number"><?php echo $value->article_number;?></h2>    
	<div class="product-image clearfix">
	<div class="photo-gallery">
		<ul>
	<?php foreach ($value->image as $key => $image) { ?>
		<li>
			<a href="<?php echo SERVER;?>assets/images/products/<?=$image->image;?>" data-lightbox="example-set" data-title="">
			<img src="<?php echo SERVER;?>assets/images/products/<?=$image->image;?>" alt="image"  class="img-fluid" /></a>       
		</li>
	<?php } ?>
	</ul>        
	</div>
	</div>
	</div>
	<div class="col2">
	<div class="size-stock-table-wrapper">
	<ul class="list-unstyled size-stock-table">
	<?php foreach ($value->disc as $key2 => $value2) {
	$current_stock=$value2->sku; 
		if($current_stock<=0)
		{
			$pending=$pending+$current_stock;
		}
		else
		{
			$stock=$stock+$current_stock;
		}
		?>
		<li><label><span class="size"><?=$value2->size?></span><span class="spliter">-</span><span class="stock-number"><?=$value2->sku?></span></label><input type="text"></li>
	<?php } ?>
	</ul>    
</div>                        
</div>
    
<div class="stock-and-pending-status">
<div class="stock-status"><span class="label">Stock</span><span class="stock-number"><?=$stock;?></span></div>
<div class="pending-status"><span class="label">Pending</span><span class="pending-number"><?=$pending;?></span></div>        
</div>    

<button class="update-button btn btn-primary red-button" type="submit">Update</button>    
    
</div>
</li>
<?php 

} 
?>


</ul> 
</div>        
</div>    

</div>    
