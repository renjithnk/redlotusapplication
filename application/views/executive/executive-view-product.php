
<div class="content-wrapper executive-view-product clearfix">
    
<div class="menutrigger">
<div class="bar1"></div>
<div class="bar2"></div>
<div class="bar3"></div>
</div>

<?php $this->view('includes/executive-navigation'); ?>    
    
<div class="main-content-wrapper">
<h2 class="heading">Products</h2>
<div class="product-list-wrapper">
<div class="container">    
<div class="row">
<?php 
if($product!="0")
{

foreach($product as $key =>$value)
{
	$stock=0;
	$pending=0; ?>
<div class="col-lg-4 product-list">
	<div class="product-details-wrapper">
<h2 class="article-number"><?=$value->article_number;?></h2>             
	<div class="col1">
	   
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
	<li>
		<label>
			<span class="size"><?=$value2->size?></span><span class="spliter">-</span><span class="stock-number" id="stock-number_<?=$value->product_id; ?>_<?=$value2->description_id;?>" <?php if($value2->sku<0) { ?> style="color: red;" <?php } ?>><?=$value2->sku?></span>
		</label>
		<input type="text" name="new_stock_<?=$value->product_id; ?>_<?=$value2->description_id;?>" id="new_stock_<?=$value->product_id; ?>_<?=$value2->description_id;?>" onkeyup="display_order_qty(<?php echo $value->product_id;?>, <?php echo $value2->description_id;?>)"  value="">
		<input type="hidden" name="current_stock_<?=$value->product_id; ?>_<?=$value2->description_id;?>" id="current_stock_<?=$value->product_id; ?>_<?=$value2->description_id;?>" value="<?=$value2->sku?>">
	</li>
	<?php } ?>
	</ul>    
</div>                        
</div>    
<div class="stock-and-pending-status">
<input type="hidden" id="hidden_full_stock_<?=$value2->product_id;?>" value="<?=$stock?>" style="display: block;">
<div class="stock-status"><span class="label">Stock</span><span class="stock-number" id="full_stock_<?=$value2->product_id;?>"><?=$stock;?></span></div>
<div class="pending-status"><span class="label">Pending</span><span class="pending-number"><?=$pending;?></span></div>       
</div>    
<button class="update-button btn btn-primary red-button" onClick="myFunction(<?php echo $value->product_id;?>)" type="submit">Order</button>      
</div>
</div>

<?php } }

else

{
	echo "<div class='alert-messages'>No Relative products where Found</div>";
}?>

</div> 
</div>     
</div>        
</div>
</div>
