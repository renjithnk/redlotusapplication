<div class="content-wrapper admin-view-product clearfix">
    
<div class="menutrigger">
<div class="bar1"></div>
<div class="bar2"></div>
<div class="bar3"></div>
</div>
<nav id="main-navigation" class="main-navigation">
<ul class="list-unstyled">
<li><a href="admin-view-product">View Product</a></li>		    
<li><a href="admin-add-product">Add Product</a></li>
<li><a href="admin-view-orders">View Orders</a></li>
</ul>
</nav>   
    
<div class="main-content-wrapper">
<h2 class="heading">Products</h2>
<div class="product-list-wrapper">
<ul class="list-unstyled">

<?php 
foreach($product as $key =>$value)
{ 
	/*print_r($value->image[1]->image);
	print_r($product); die();*/
	$stock=0;
	$pending=0; ?>

	<li class="product-list">
	<div class="product-details-wrapper">
	<div class="col1">
	<h2 class="article-number">A101</h2>    
	<div class="product-image clearfix">
	<?php 
	$i=0;
	$first_image="";
	foreach ($value->image[$i] as $key => $images) { 
		$i++;
		?>
		
		<div class="photo-gallery">
	<div class="popup-clicker"><img src="<?php echo SERVER;?>assets/images/products/<?=$images;?>" class="img-fluid"/></div>
	<div class="popup">
	<div class="popup-content">
	<div class="swiper-container">
	<div class="swiper-wrapper">
		<?php foreach($value->image as $key => $image) { ?>
		<div class="swiper-slide" style="background-image:url(<?php echo SERVER;?>assets/images/products/<?=$image->image;?>);background-position: center center;background-repeat: no-repeat;background-size:cover;"></div>
		<?php  } ?>
	</div>
	<div class="swiper-pagination"></div>
	</div>   
	<div class="popupclose"><span class="one"></span><span class="two"></span></div>
	</div>
	</div>        
	</div>
	<?php } ?>

	<!-- <div class="photo-gallery">
	<div class="popup-clicker"><img src="images/product1/p1.jpg" class="img-fluid"/></div>
	<div class="popup">
	<div class="popup-content">
	<div class="swiper-container">
	<div class="swiper-wrapper">
	<div class="swiper-slide" style="background-image:url(images/product1/p1.jpg);background-position: center center;background-repeat: no-repeat;background-size:cover;"></div>
	<div class="swiper-slide" style="background-image:url(images/product1/p1.jpg);background-position: center center;background-repeat: no-repeat;background-size:cover;"></div>
	<div class="swiper-slide" style="background-image:url(images/product1/p1.jpg);background-position: center center;background-repeat: no-repeat;background-size:cover;"></div>
	</div>
	<div class="swiper-pagination"></div>
	</div>   
	<div class="popupclose"><span class="one"></span><span class="two"></span></div>
	</div>
	</div>        
	</div>  -->


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
	<input type="text" id="new_stockss_<?=$value2->description_id;?>" value="<?=$value2->sku?>" style="display: none;">
	<li><label><span class="size"><?=$value2->size?></span><span class="spliter">-</span><span class="stock-number" id="stock-number_<?=$value2->description_id;?>"><?=$value2->sku?></span></label><input type="text" id="new_stock_<?=$value2->description_id;?>" onkeyup= "updateSock('<?php echo $value2->description_id; ?>')"></li>
	<?php } ?>
	</ul>    
</div>                        
</div>    
<div class="stock-and-pending-status">
	<input type="text" id="hidden_full_stock" value="<?=$stock?>" style="display: none;">
<div class="stock-status"><span class="label">Stock</span><span class="stock-number" id="full_stock"><?=$stock;?></span></div>
<div class="pending-status"><span class="label">Pending</span><span class="pending-number"><?=$pending;?></span></div>       
</div>    
<button class="update-button btn btn-primary red-button" type="submit">Update</button>      
</div>
</li>

<?php } ?>




</ul> 
</div>        
</div>


    
</div>    
