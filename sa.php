<?php
require_once('config.php');
session_start();
$strings = $_SESSION['string'];

?>
<!DOCTYPE html>
<html>
<head>
<title>Facebook Login JavaScript Example</title>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body >
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
   <ul class="nav nav-tabs">
  <li><a href="index.php">Home</a></li>
  <li class="active"><a href="sa.php">Sentimental Analysis</a></li>
  <li><a href="graph.php">Search</a></li>
</ul>
    </div>
  </div>

  <div class="row">
   <div class="col-md-12" style="margin: 30px;">
    <span class="label label-default" id="name" style="font-size: 20px;">Welcome !<?php echo $_SESSION['name']; ?></span>
    <button type="button" onclick="Logout()" style="display: none" id="logbtn" class="btn btn-md btn-danger active">
        Logout
      </button>
</br>
   </div>
  </div>
  <div class="row">
    <div class="col-md-12">
       
    

    </div>
  </div>
 <div class="row"> 
    <div class="col-md-12">
    <table class="table" id="grptable">
    <thead>
<th>Post Content</th>
<th>Neutral</th>
<th>Negative</th>
<th>Positive</th>

    </thead>
    <tbody>
<?php

require_once __DIR__ . '/autoload.php';
$sentiment = new \PHPInsight\Sentiment();
$i=0;
foreach ($strings as $string) {
$i++;
  // calculations:
  $scores = $sentiment->score($string);
  $class = $sentiment->categorise($string);



  $key = array_search(max($scores), $scores);
    echo '<tr>';
     echo '<td>'.$string.'</td>';
  if($key == "neu")
  {
    echo '<td style="background-color: #d58512;">'.$scores['neu'].'</td>';
  echo '<td>'.$scores['neg'].'</td>';
  echo '<td>'.$scores['pos'].'</td>';

  }
  else  if($key == "neg")
  {
    echo '<td>'.$scores['neu'].'</td>';
  echo '<td style="background-color: rgb(201, 48, 44);">'.$scores['neg'].'</td>';
  echo '<td>'.$scores['pos'].'</td>';

  }
  else
  {
    echo '<td>'.$scores['neu'].'</td>';
  echo '<td>'.$scores['neg'].'</td>';
  echo '<td style="background-color:#5cb85c;">'.$scores['pos'].'</td>';
  }
  // output:

 
  echo '</tr>';
  
  
}

?>
</tbody>
</table>
</body>
</html>