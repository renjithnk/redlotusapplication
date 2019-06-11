var base_url='http://localhost/redlotus/index.php/';

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
      window.location = base_url+"admin-dashboard";
    }
    else if (data=="false") {
      $( "#error_message" ).load(window.location.href + " #error_message" );
    }
  });
  request.fail( function ( jqXHR, textStatus) {
    console.log( 'Sorry: ' + textStatus );
  });
}