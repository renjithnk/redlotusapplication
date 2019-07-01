var base_url='http://localhost/redlotusapplication/index.php/';

function adminLoginCheck()
{
  var exampleInputEmail1 = document.getElementById("exampleInputEmail1").value;
  var exampleInputPassword1 = document.getElementById("exampleInputPassword1").value;
  var request = $.ajax({
    url: base_url + 'admin-login-check',
    type: 'POST',
    data: { exampleInputEmail1: exampleInputEmail1,exampleInputPassword1:exampleInputPassword1} ,
    dataType: 'html'
  });
  request.done( function ( data ) {
    if (data=="true") {
      window.location = base_url+"admin-view-product";
    }
    else if (data=="false") {
      $( "#error_message" ).load(window.location.href + " #error_message" );
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
  alert("wefa");
  var request = $.ajax({
    url: base_url + 'user-login-check',
    type: 'POST',
    data: { user_email: user_email,user_password:user_password} ,
    dataType: 'html'
  });
  request.done( function ( data ) {
    if (data=="true") {
      window.location = base_url+"user-categories";
    }
    else if (data=="false") {
      $( "#error_message" ).load(window.location.href + " #error_message" );
    }
  });
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  });
}

function updateSock(element) {
  var desc_id=element;
  var new_sock=document.getElementById("new_stock_"+desc_id).value;
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
      dataType: 'html'
    });
    request.done( function ( data ) {
      if (data!="0") {
        var current=parseInt(document.getElementById("stock-number_"+desc_id).innerText);
        var data=parseInt(data);
        var new_value=data;
        document.getElementById("stock-number_"+desc_id).innerText=new_value; 
        var full=parseInt(document.getElementById("hidden_full_stock").value);
        var new_socks=parseInt(new_sock);
        var full_new=full+new_socks;
        if(new_sock!="")
        document.getElementById("full_stock").innerText=full_new;
        else
        {
          document.getElementById("full_stock").innerText=full;
        } 

      }
    });
    request.fail( function ( jqXHR, textStatus) {
      console.log( 'Sorry: ' + textStatus );
    });
    }
}

function myFunction(a,b)
{
  
  var desc_id=a;
  var product_id=b;
  var product_quantity=document.getElementById("new_stock_"+desc_id).value;
  var request = $.ajax({
    url: base_url + 'executive-add-to-cart',
    type: 'POST',
    data: { desc_id: desc_id,product_id:product_id,product_quantity:product_quantity} ,
    dataType: 'html'
  });
  request.done( function ( data ) {
    document.getElementById("cart_item_count").innerText=data;
  });
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  });
}

function deleteCart(a,price)
{
  var cart_id=a;
  document.getElementById(a).style.display = "none";
  var request = $.ajax({
    url: base_url + 'executive-delete-cart',
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
      url: base_url + 'executive-place-order',
      type: 'POST',
      data: { name: name,gst:gst,address:address},
      dataType: 'html'
  });

  request.done( function ( data2 ) {
    if(data2 == "1")
    {
      var delay = 1000; 
      setTimeout(function(){ window.location = "http://localhost/redlotusapplication/index.php/user-view-product"; }, delay);
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
  window.location = "http://localhost/redlotusapplication/index.php/user-view-product/"+name;
}