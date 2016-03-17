<?php
require_once('config.php');
session_start();
?><!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body >
<script>

 var keywrd = "<?php echo $var; ?>";

 console.log(keywrd);

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{app-id}',
      xfbml      : true,
      cookie     : true,
      version    : 'v2.5'
    });
  };

(function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "http://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


function Login()
    {
 
        FB.login(function(response) {
           if (response.authResponse) 
           {
                getUserInfo(); // Get User Information.
            
$('#lgnbtn').css("display", "none");
$('#grpbtn').css("display", "block");
$('#logbtn').css("display", "block");

            } else
            {
             console.log('Authorization failed.');
            }
         },{scope: 'email'});
 
    }


function show_group()
{
  
FB.api(
     '/<?php echo '161728887228029';?>/feed',
     "GET",
     {"fields":"id,description,message,story,updated_time"},
    function (response) {
      if (response && !response.error) {
        /* handle the result */
console.log(response.data[0].story);
for (var i = 0; i < response.data.length; i++) {


$.post("add_data.php", 
  {id:response.data[i].post_id},
  {update_time:response.data[i].updated_time},
  {story:response.data[i].story},
  {description:response.data[i].description},
  {message:response.data[i].message}
  );        



         var str="<tr><td>"+i+"</td>";
          str +="<td>"+response.data[i].post_id+"</td>";
          str +="<td>"+response.data[i].updated_time+"</td>";
          str +="<td>"+response.data[i].story+"</td>";
          str +="<td>"+response.data[i].description+"</td>";
          str +="<td>"+response.data[i].message+"</td></tr>";
 var div = document.getElementById('tblbody')
     div.innerHTML = div.innerHTML+str;
     }


      
   
    }
  }
);

}
    function getUserInfo() {
       FB.api('/me', function(response) {
 
       var str="Welcome !"+response.name;
      

        });
   }

   FB.Event.subscribe('auth.authResponseChange', function(response) 
{
     if (response.status === 'connected') 
     {
        //SUCCESS
     }   
     else if (response.status === 'not_authorized') 
    {
        //FAILED
    } else
    {
        //UNKNOWN ERROR. Logged Out
    }
});

   function Logout()
{
    FB.logout(function(){document.location.reload();});
 
}

</script>





<div class="container-fluid">

  <div class="row">
   <div class="col-md-12" style="margin: 30px;">
    <span class="label label-default" id="name" style="font-size: 20px;">Name</span>
    <button type="button" onclick="Logout()"
      style="display: none"
     id="logbtn" class="btn btn-md btn-danger active">
        Logout
      </button>
</br>
   </div>
  </div>
  <div class="row">
    <div class="col-md-12">

<button type="button" onclick="show_group()" style="display: none" id="grpbtn" class="btn btn-lg btn-warning active">
      Show Group Feed
      </button>
   
      <button type="button" onclick="Login()" id="lgnbtn" class="btn btn-lg btn-primary active">
        Login to facebook
      </button>
      <?php

    
    ?>
      
      
    </div>
  </div>
 <div class="row"> 
    <div class="col-md-12">
    <table class="table" id="grptable">
    <thead>
          <tr>
            <th>
            Sno
            </th>
            <th>
              Post Id
            </th>
            <th>
             Time
            </th>
            <th>
              Story
            </th>
            <th>
             Description
            </th>
            <th>
             Message
            </th>
          </tr>
        </thead>
        <tbody id="tblbody">

        </tbody>
      

    </table>
    </div>

  </div>
</div>

</body>
</html> 