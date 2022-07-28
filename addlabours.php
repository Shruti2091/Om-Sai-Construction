<!DOCTYPE html>
<html lang="en">
<?php
$server="localhost";
$userid ="root";
$Password = "";
$myDB = "ems";
$con = mysqli_connect($server,$userid,$Password,$myDB);
if (mysqli_connect_errno()) {
# code...
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<head>
<title>Add Labours</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
body {
	background-color: #dddddd;
	}
#img {
	width: 200px;
	height: 120px;
}
.name_list
{
	align-items: center;
	align-self: center;
	width: 400px;
	margin-top: 10px;
}
#add{
	margin-top: 10px;
}
.text{
  background-color: #56AAfd;
  margin-top: 10px;
  width: 140px;     
  padding: 15px;      
  border: none;   
  cursor: pointer;
  font-size: 16px;
  color: white;
}
</style>
</head>
<body>
	<center><div><a><img id="img" src="logo.png"></a></div>
	<h1>Add labour</h1>
	<div class="form-group">  
        <form action="" method="POST">   
                <div class="table table-bordered" id="dynamic_field">  
                    <input type="text" name="name" placeholder="Enter Name" class="form-control name_list"/>
                </div>  
            	<input type="submit" class="text" name="snew" value="Submit"/>  
        </form>  
    </div>
    <?php
  	if(isset($_POST['snew']))
  	{
    	$x = $_POST['name'];  
		$query = "CREATE TABLE $x(dates varchar(20) primary key, work varchar(5), month int(5), week int(5), amount int(50))";  
		$query_run = mysqli_query($con, $query); 
  		if($query_run)
		{
      		echo '<script type="text/javascript"> alert("Employee Added Successfully")</script>';  
		}  
		else  
		{  
      		echo '<script type="text/javascript"> alert("Unable to add employee: Please enter a valid name")</script>';  
		}
	}  
  	?>
	</center>  
</body>
</html>
