function adminLoginCheck()
{
  var exampleInputEmail1 = document.getElementById("exampleInputEmail1").value;
  var exampleInputPassword1 = document.getElementById("exampleInputPassword1").value;
  var request = $.ajax({
    url: base_url_js + 'admin-login-check',
    type: 'POST',
    data: { exampleInputEmail1: exampleInputEmail1,exampleInputPassword1:exampleInputPassword1} ,
    dataType: 'html'
  });
  request.done( function ( data ) {
    if (data=="true") {
      window.location = base_url_js+"admin-view-product";
    }
    else if (data=="false") {
      $( ".error_messagess" ).load(window.location.href + " .error_messagess" );
    }
  });
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  });
}

function userLoginCheck()
{
  var user_email = document.getElementById("user_email").value;
  var user_password = document.getElementById("user_password").value;
  var request = $.ajax({
    url: base_url_js + 'executive-login-check',
    type: 'POST',
    data: { executive_email: user_email,executive_password:user_password} ,
    dataType: 'html'
  });
  request.done( function ( data ) {
    if (data=="true") {
      window.location = base_url_js+"executive-categories";
    }
    else if (data=="false") {
      $( ".error_messagess" ).load(window.location.href + " .error_messagess" );
    }
  });
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  });
}

function updateSock_old(element,product_id) {
  var desc_id=element;
  var new_sock=parseInt(document.getElementById("new_stock_"+desc_id).value);
  var hidden_sock=document.getElementById("new_stockss_"+desc_id).value;
  if (event.keyCode === 10 || event.keyCode === 13) {
        event.preventDefault();
    }
    else
    {
      var request = $.ajax({
        url: 'admin-update-sock',
      type: 'POST',
      data: {desc_id:desc_id,hidden_sock:hidden_sock,new_sock:new_sock} ,
      dataType: 'json'
    });
    request.done( function ( data ) {
      if (data!="0") {
        var current=parseInt(document.getElementById("stock-number_"+desc_id).innerText);
        var data=parseInt(data);
        var new_value=data;
        document.getElementById("stock-number_"+desc_id).innerText=new_value; 
        var full=parseInt(document.getElementById("hidden_full_stock_"+product_id).value);
        var new_socks=parseInt(new_sock);
        var full_new = parseInt(full) - parseInt(current) + parseInt(new_value);
        document.getElementById("full_stock_"+product_id).innerText=full_new;
        document.getElementById("hidden_full_stock_"+product_id).value=full_new;
      }
    });
    request.fail( function ( jqXHR, textStatus) {
      console.log( 'Sorry: ' + textStatus );
    });
    }
}

function despatchStock(order_id)
{
  var request = $.ajax({
    url: base_url_js + 'admin-despatch-stock',
    type: 'POST',
    data: { order_id:order_id} ,
    dataType: 'json'
  });
  request.done( function ( data ) {
      alert(" Stock Despatched ");
      window.location.href = window.location.href;
  });
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  });  
}


function updateStock(product_id)
{
  var stock_details = '';
  $("input[name^='new_stock_"+product_id+"']").each(function() {
    var feild_name = $(this).attr('name');
    var res = feild_name.split("_");
    var length = res.length;
    desc_id = res[length-1];
    var product_quantity=parseInt($(this).val());
    if(isNaN(product_quantity)) {
      product_quantity = parseInt(0);
    }  
    stock_details = stock_details +  desc_id + ":" + product_quantity + "|";
});

  var request = $.ajax({
    url: base_url_js + 'admin-update-sock',
    type: 'POST',
    data: { product_id:product_id,stock_details:stock_details} ,
    dataType: 'json'
  });
  request.done( function ( data ) {
      alert(" Stock Updated ");
      window.location.href = window.location.href;
  });  
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  });  
}

function myFunction(product_id)
{
  var order_details = '';
  $("input[name^='new_stock_"+product_id+"']").each(function() {
    var feild_name = $(this).attr('name');
    var res = feild_name.split("_");
    var length = res.length;
    desc_id = res[length-1];
    var product_quantity=parseInt($(this).val());
    if(isNaN(product_quantity)) {
      product_quantity = parseInt(0);
    }
    order_details = order_details +  desc_id + ":" + product_quantity + "|";
});

  var request = $.ajax({
    url: base_url_js + 'executive-add-to-cart',
    type: 'POST',
    data: { product_id:product_id,order_details:order_details} ,
    dataType: 'json'
  });
  request.done( function ( data ) {
    var total_order = 0;
    $("input[name^='new_stock_"+product_id+"']").each(function() {
      var feild_name = $(this).attr('name');
      var res = feild_name.split("_");
      var length = res.length;
      desc_id = res[length-1];
  
      var product_quantity=parseInt($(this).val());
      if(isNaN(product_quantity)) {
        product_quantity = parseInt(0);
      }
      total_order = total_order + product_quantity;
  });  

    document.getElementById("cart_item_count").innerText=data;
    var full=parseInt(document.getElementById("hidden_full_stock_"+product_id).value);
    var full_new = parseInt(full) - parseInt(total_order);
    document.getElementById("full_stock_"+product_id).innerText=full_new;
  });
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  }); 
}

function display_order_qty(product_id, desc_id)
{
  var qty=parseInt(document.getElementById("new_stock_"+product_id + "_" + desc_id).value);
  var current = parseInt(document.getElementById("current_stock_"+product_id + "_" + desc_id).value);
      if(isNaN(qty)) {
        qty = parseInt(0);
      }
      stock_new = current - qty;
    document.getElementById("stock-number_"+product_id+ "_"+desc_id).innerText=stock_new; 
}

function deleteCart(a,price)
{
  var cart_id=a;
  document.getElementById(a).style.display = "none";
  var request = $.ajax({
    url: base_url_js + 'executive-delete-cart',
    type: 'POST',
    data: { cart_id: cart_id} ,
    dataType: 'html'
  });
  request.done( function ( data ) {
    if(data==1)
    {
      var total=parseInt(document.getElementById("total").innerText);
      var new_total=total-price;
      document.getElementById("total").innerText=new_total;
    }
  });
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  });
}

function placeOrder()
{
  var name=document.getElementById("name").value;
  var gst=document.getElementById("gst").value;
  var address=document.getElementById("address").value;
  if(name =='' && gst=='' && address=='')
  {
    alert("Oops fill all the fields");
  }
  else if(name=='')
  {
    alert("Oops name is a mandatory please fill all the fields");
  }
  else if(gst=='')
  {
    alert("Oops GST is a mandatory please fill all the fields");
  }
  else if(address=='')
  {
    alert("Oops Address is a mandatory please fill all the fields");
  }
  else
  {
    var request = $.ajax({
      url: base_url_js + 'executive-place-order',
      type: 'POST',
      data: { name: name,gst:gst,address:address},
      dataType: 'html'
  });

  request.done( function ( data2 ) {
    if(data2 == "1")
    {
      var delay = 1000; 
      setTimeout(function(){ window.location = base_url_js + "/executive-view-product"; }, delay);
      alert('Your Order Placed');
    } 
    else
    {
      alert("Oops Something went wrong");
    }
  });
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  })
  }                                                         
}

function searchProduct()
{
  var name=document.getElementById("seach_item").value;
  window.location = base_url_js + "executive-view-product/"+name;
}
function searchProducts()
{
  var name=document.getElementById("seach_item").value;
  window.location = base_url_js + "admin-view-product/"+name;
}

function deleteProduct(element)
{
  var request = $.ajax({
    url: base_url_js + 'delete-product',
    type: 'POST',
    data: { element: element} ,
    dataType: 'html'
  });
  request.done( function ( data ) {
    if(data==1)
    {
       window.location = base_url_js + "/admin-view-product";
    }
  });
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  }); 
}

function clearOrders()
{
  var request = $.ajax({
    url: base_url_js + 'clear-orders',
  });
  request.done( function ( data ) {
    if(data==1)
    {
 	    alert('Your Order Cleared');
        window.location.href = window.location.href;
    }
  });
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  });  
}