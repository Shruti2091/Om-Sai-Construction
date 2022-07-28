<!DOCTYPE html>
<html>
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
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Manage Labours</title>
<style>
body {
	background-color: #dddddd;
	}
select{
  background-color: #3498DB;
  color: white;
  width: 200px;     
  padding: 15px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

#img {
	width: 200px;
	height: 120px;
}
#button1 { 
		position: relative;
		margin-top: 10px;
    background-color: #3498DB;   
    width: 200px;     
    padding: 15px;      
    border: none;   
    cursor: pointer;
    color: white;
    font-size: 16px;
        }   
  
#button1:hover {   
        opacity: 0.7;   
    } 
.dropbtn:hover {
    opacity: 0.7;
}
/* Dropdown button on hover & focus */


/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: relative;
  background-color: #f1f1f1;
  width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
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
/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
}
</style>
<script>
	/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it

</script>
</head>
<body>
	<center><div><a><img id="img" src="logo.png"></a></div>
		<h1>Manage Labours</h1>
    <form action="" method="POST">
<?php 
    echo '<select class="dropbtn" name="emp_name">
      <option>Delete Labour</option>';
      $sqli = "SHOW TABLES";
      $result = mysqli_query($con, $sqli);
      while ($row = mysqli_fetch_array($result)) {
      echo '<option class="dropbtn">'.$row[0].'</option>';
    }
  echo '</select>';
?>
<div><input type="submit" class="text" name="delete" value="DELETE"/></div>
<h2>OR</h2> 
</form>
  <?php
    if(isset($_POST['delete']))
    {
    $empname = $_POST['emp_name'];

    $query = "drop table $empname";
    $query_run = mysqli_query($con,$query);

    if($query_run)
    {
      echo '<script type="text/javascript"> alert("Labour deleted")</script>';
    }
    else
    {
      echo '<script type="text/javascript"> alert("Could not delete labour: Please select name")</script>';
    }
  }
  ?>
  <a href="addlabours.php"><button id="button1">Add Labour</button></a>
</body>
</html>


