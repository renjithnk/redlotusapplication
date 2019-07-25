

<div class="content-wrapper clearfix">
    
    
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
<h2 class="heading">Add Products</h2>
<div class="add-products-wrapper">    
    
<div class="add-product-form">
  <form method="post" action="insert-product">

<!--
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Article No.</label>
      <input type="text" class="form-control" id="articleno" name="articleno" placeholder="Article No" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Color</label>
      <select id="color" name="color" class="form-control" required>
      <?php
        echo '<option value="">SELECT</option>';
        foreach($colors as $key =>$value)
      {
        echo '<option value="' . $value->id .'">'. $value->color_name .'</option>';
      } ?>
      </select>
    </div>
</div>    
-->

<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Article No.</label>
      <input type="text" class="form-control" id="articleno" name="articleno" placeholder="Article No" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Size</label>
      <input type="text" class="form-control" id="size"  name="size" placeholder="Size" required>
    </div>
</div>    
    
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Price</label>
      <input type="text" class="form-control" id="email"  name="price" placeholder="Price" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">No of Stock</label>
      <input type="text" class="form-control" id="numberofstock"  name="sku" placeholder="No of Stock" required>
    </div>
</div> 

<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Category</label>
      <select name="category" class="form-control">
        <option value="Formal">Formal</option>
        <option value="Casual">Casual</option>
        <option value="Sandel">Sandel</option>
        <option value="Sleeper">Sleeper</option>
        <option value="Loffer">Loffer</option>
        <option value="Roman Bantu">Roman Bantu</option>
        <option value="Bantu">Bantu</option>
      </select>
    </div>
</div>      

<div class="form-group">
  <div id="my-dropzone" class="dropzone">
    <div class="dz-message">
      <h3>Drop files here</h3> or <strong>click</strong> to upload
    </div>
  </div>
</div>    
<button type="submit" value="submit" class="btn btn-primary" id="submit_button" style="display: block;">Submit</button>     
   </form>     
</div>  

</div>    
</div>    
    

</div> 

</head>  
<script src="<?php echo SERVER; ?>assets/js/dropzone.min.js"></script> 
<script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#my-dropzone", {
            url: "<?php echo base_url("images-upload") ?>",
            acceptedFiles: "image/*",
            addRemoveLinks: true, 
            success : function(file, response){
        		if(response==1)
        		{
        			document.getElementById("submit_button").style.display="block";
        		}
    		},
            removedfile: function(file) {
                var name = file.name;
                var extension=name.split('.').pop();
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url("images-remove") ?>",
                    data: { file: name,extension:extension},
                    dataType: 'html'
                });

                // remove the thumbnail
                var previewElement;
                return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
            },
            init: function() {
                var me = this;

                $.get("<?php echo base_url("images-list_files") ?>", function(data) {
                    // if any files already in server show all here
                    if (data.length > 0) {
                        $.each(data, function(key, value) {
                            var mockFile = value;
                            me.emit("addedfile", mockFile);
                            me.emit("thumbnail", mockFile, "<?php echo SERVER; ?>assets/images/news/" + value.name);
                            me.emit("complete", mockFile);
                        });
                    }
                });
            }
        });
    </script>

    <script>
    $(document).ready(function(){
      $("#articleno").onkeyup(function(){
        var content=document.getElementById("articleno").value;
//        var color=document.getElementById("color").value;
        var request = $.ajax({
        url: 'admin-product-check',
        type: 'POST',
        data: { content: content} ,
        dataType: 'html'
        });
      request.done( function ( data ) {
      if (data=="1") {
            document.getElementById("my-dropzone").style.display = "none";
            document.getElementById("submit_button").style.display="block";
        }
      else {
            document.getElementById("my-dropzone").style.display = "block";
            //ADDED BY RAJEEV, NOT SURE WHY SUBMIT BUTTON WAS HIDDEN
            document.getElementById("submit_button").style.display="block";
        }
      });
      request.fail( function ( jqXHR, textStatus) {
        console.log( 'Sorry: ' + textStatus );
        });
      });
    });
</script>

 





