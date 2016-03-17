<?php
session_start();
include "wordstemmer.php";
include "search.php";
require_once('config.php');

if(isset($_POST['submit']))
{
$lib_search = new Libs_Search($_POST['keyword']);
$query_string = $lib_search->GetSearchQueryString();

$sql = "SELECT * FROM hack where MATCH(message) AGAINST('$query_string' IN BOOLEAN MODE)";

  $Result = $db->query($sql);

}
 
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
  <li ><a href="index.php">Home</a></li>
  <li><a href="sa.php">Sentimental Analysis</a></li>
  <li class="active"><a href="graph.php">Search</a></li>
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
    <div class="col-sm-2">
   <form role="form" action="" method="POST">
				<div class="form-group">
					 
					<label for="keyword">
						Enter Keyword 
					</label>
					<input class="form-control" id="keyword" name="keyword" type="test" />
	<button id="submit" name="submit" type="submit" class="btn btn-md btn-default">
        Search
      </button>
				</div>

  </form>
    

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
        <tbody>
       
<?php

if(isset($_POST['submit']))
{
  
  
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
  
 
  }

}
?>
          


        </tbody>
      

    </table>
    </div>

  </div>
</div>

</body>
</html> 