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

function show_group()
    {

$('#grptable').css("display", "block");
    }
function Login()
    {
 
        FB.login(function(response) {
           if (response.authResponse) 
           {
                getUserInfo(); // Get User Information.
            console.log(response);

$.post("session.php", {status:response.status}); 

            } else
            {
             console.log('Authorization failed.');
            }
         },{scope: 'email'});
 
    }

    function getUserInfo() {
       FB.api('/me', function(response) {
 
       var str="Welcome !"+response.name;
  
$.post("session.php", {name:response.name});        
          document.getElementById("name").innerHTML=str;

$('#lgnbtn').css("display", "none");
$('#grpbtn').css("display", "block");
$('#logbtn').css("display", "block");

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
    <div class="col-md-12">
   <ul class="nav nav-tabs">
  <li class="active"><a href="index.php">Home</a></li>
  <li><a href="sa.php">Sentimental Analysis</a></li>
  <li><a href="graph.php">Search</a></li>
</ul>
    </div>
  </div>

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
      
 <?php
     
    
      ?>
<button type="button" onclick="show_group()" style="display: none" id="grpbtn" class="btn btn-lg btn-warning active">
      Show Group Feed
      </button>
      <?php

      ?>
      <button type="button" onclick="Login()" id="lgnbtn" class="btn btn-lg btn-primary active">
        Login to facebook
      </button>
      <?php

    
    ?>
      
      
    </div>
  </div>
 <div class="row"> 
    <div class="col-md-12">
    <table class="table" id="grptable" style="display: none">
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
        <tbody>
<?php


  $Result = $db->query("SELECT * FROM hack");
$strings = array();
  foreach($Result->fetchALL() as $row)
  { 
    echo '<tr>';
    echo '<td>'.$row->sno.'</td>';
    echo '<td>'.$row->post_id.'</td>';
    echo '<td>'.$row->time.'</td>';
    echo '<td>'.$row->story.'</td>';
    echo '<td>'.$row->description.'</td>';
    echo '<td>'.$row->message.'</td>';
    echo '</tr>';
  
  array_push($strings,$row->message);
  }

  $_SESSION['string']=$strings;

?>
          


        </tbody>
      

    </table>
    </div>

  </div>
</div>

</body>
</html> 