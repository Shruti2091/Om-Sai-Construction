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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Modify Attendance</title>
<style>
body {
	background-color: #dddddd;
	}

select{
  background-color: #3498DB;
  color: white;
  width: 150px;
  padding: 5px;     
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
    margin-right: 10px;
        }   
.myclass
{
  background-color: #3498DB;
  color: white;
  width: 150px;
  padding: 2px;     
  font-size: 16px;
  border: none;
  cursor: pointer;
}
#button1:hover {   
        opacity: 0.7;   
    } 
.dropbtn:hover {
    opacity: 0.7;
}
/* Dropdown button on hover & focus */

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
	<h1>Modify Attendance</h1>
  
   <?php
$q = "show tables";
$result = mysqli_query($con, $q);
$fields = array();
while($row = mysqli_fetch_array($result)) {
    $fields[] = $row[0];
}
?>
<div><br></div>
<form id="generate-form" method="POST" action="">
<?php 
    echo '<select class="dropbtn" name="emp_name">
      <option>Select Labour</option>';
      $sqli = "SHOW TABLES";
      $result = mysqli_query($con, $sqli);
      while ($row = mysqli_fetch_array($result)) {
      echo '<option class="dropbtn">'.$row[0].'</option>';
    }
  echo '</select>';
?>
<span style="margin-right: 40px;"></span>


<input type="date" class="myclass" name="date"/>
<div><br></div>

<input type="text" name="work" placeholder="Work"/>
<span style="margin-right: 40px;"></span>

<input type="text" name="amount" placeholder="Amount"/>
<div><br></div>
<center><input id="button1" type="submit" name="submit" /></center>
</form>

<?php
    if(isset($_POST["submit"]))
    {
        $amount = $_POST["amount"];
        $labour = $_POST["emp_name"];
        $date1 =  $_POST["date"];
        $date = mysqli_real_escape_string($con, $date1);
        $work = $_POST["work"];
        $mvar = "SELECT EXTRACT(MONTH FROM '$date')";
        $res = $con->query($mvar);
        while($row = $res->fetch_assoc())
        {
          $month = $row["EXTRACT(MONTH FROM '$date')"];
        }

        $mvar1 = "SELECT EXTRACT(WEEK FROM '$date')";
        $res1 = $con->query($mvar1);
        while($row = $res1->fetch_assoc())
        {
          $week = $row["EXTRACT(WEEK FROM '$date')"];
        }
        
        $myvar2 = "UPDATE $labour SET work = '$_POST[work]', month = $month, week = $week, amount = $amount WHERE dates = '$_POST[date]'";
        $res3 = $con->query($myvar2);
        if($res3)
        {
          echo '<script type="text/javascript"> alert("Updated Successfully")</script>';
        }
        else  
        {
          echo '<script type="text/javascript"> alert("Please Enter Valid Details")</script>';
        }
    }
     ?>
 
</body>
</html>