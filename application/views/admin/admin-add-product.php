

<div class="content-wrapper clearfix">
    
    
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
<div class="add-products-wrapper">    
    
<div class="add-product-form">
  <form method="post" action="insert-product">
<div class="form-row">

    <div class="form-group col-md-6">
      <label for="inputEmail4">Article No.</label>
      <input type="text" class="form-control" id="articleno" name="articleno" placeholder="Article No">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Size</label>
      <input type="text" class="form-control" id="size"  name="size" placeholder="Size">
    </div>
</div>    
    
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Price</label>
      <input type="text" class="form-control" id="email"  name="price" placeholder="Price">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">No of Stock</label>
      <input type="text" class="form-control" id="numberofstock"  name="sku" placeholder="No of Stock">
    </div>
</div>     

<div class="form-group">
  <div id="my-dropzone" class="dropzone">
    <div class="dz-message">
      <h3>Drop files here</h3> or <strong>click</strong> to upload
    </div>
  </div>
</div>    
<button type="submit" value="submit" class="btn btn-primary">Submit</button>     
   </form>     
</div>  

</div>    
</div>    
    

</div> 

</head>  
<script src="<?php echo SERVER; ?>vendor/dropzone/dropzone.min.js"></script> 
<script>
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#my-dropzone", {
            url: "<?php echo base_url("images-upload") ?>",
            acceptedFiles: "image/*",
            addRemoveLinks: true,
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
      $("#articleno").keyup(function(){
        var content=document.getElementById("articleno").value;
        var request = $.ajax({
        url: 'admin-product-check',
        type: 'POST',
        data: { content: content} ,
        dataType: 'html'
        });
      request.done( function ( data ) {
      if (data=="1") {
            document.getElementById("my-dropzone").style.display = "none";
        }
      else {
            document.getElementById("my-dropzone").style.display = "block";
        }
      });
      request.fail( function ( jqXHR, textStatus) {
        console.log( 'Sorry: ' + textStatus );
        });
      });
    });
</script>

 




