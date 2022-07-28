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
  table {
      border-collapse: collapse;
      width: 70%;
      color: black;
      font-family: monospace;
      font-size: 20px;
      text-align: center;
    }
    th {
      background-color: #3498DB;
      color: white;
    }
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
  
#button1:hover {   
        opacity: 0.7;   
    } 
.dropbtn:hover {
    opacity: 0.7;
}
/* Dropdown button on hover & focus */
::placeholder{
  color: white;
}

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
  background-color: #3498DB;
  margin-top: 10px;
  width: 150px;
  padding: 5px;     
  font-size: 16px;
  border: none;
  color: white;
}
/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.name_list
{
  align-items: center;
  width: 400px;
  margin-top: 10px;
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
		<h1>View Attendance</h1>
    <form action="" method="POST">
      
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
      <span style="margin-right: 15px;"></span>
<?php 
    echo '<select class="dropbtn" name="month">
      <option>Select Month</option>';
      for($i=1;$i<=12;$i++){
      echo '<option class="dropbtn">'.$i.'</option>';
    }
  echo '</select>';
?>
      <span style="margin-right: 15px;"></span>
<input type="text" name="week" placeholder="Enter Week" class="form-control text"/>
<div><input type="submit" id="button1" name="show" value="SHOW"/></div>
</form>
<div><br></div>
<table>
    <tr>
      <th>Dates</th>
      <th>Work</th>
      <th>Month</th>
      <th>Week</th>
      <th>Amount</th>
    </tr>
  <?php
    if(isset($_POST['show']) && ($_POST['month']!='Select Month') && ($_POST['week']==NULL))
    {
      if($_POST['emp_name']!='Select Labour'){
        $month = $_POST['month'];
        $empname = $_POST['emp_name'];
        $que = "select * from $empname where month=$month";
        $result = $con->query($que);
        if($result)
        {
          if ($result-> num_rows > 0) {
            while($row = $result-> fetch_assoc()) {
            echo "<tr><td>". $row["dates"]."</td><td>". $row["work"]."</td><td>". $row["month"]."</td><td>". $row["week"]."</td><td>". $row["amount"]."</td></tr>";
            }
          echo "</table>";
          }
          else
          {
          echo '<script type="text/javascript"> alert("No results found")</script>';
          }
        }
      }
      else
      {
        echo '<script type="text/javascript"> alert("Please select name")</script>';
      }
  }
  else if(isset($_POST['show']) && ($_POST['month']=='Select Month') && ($_POST['week']!=NULL))
  {
    if($_POST['emp_name']!='Select Labour'){
    $week = $_POST['week'];
    $empname = $_POST['emp_name'];
    $que = "select * from $empname where week=$week";
     $result = $con->query($que);
        if($result)
        {
          if ($result-> num_rows > 0) {
            while($row = $result-> fetch_assoc()) {
            echo "<tr><td>". $row["dates"]."</td><td>". $row["work"]."</td><td>". $row["month"]."</td><td>". $row["week"]."</td><td>". $row["amount"]."</td></tr>";
            }
          echo "</table>";
          }
          else
          {
          echo '<script type="text/javascript"> alert("No results found")</script>';
          }
        }
      }
      else
      {
        echo '<script type="text/javascript"> alert("Please select name")</script>';
      }
  }
  else if(isset($_POST['show']) && ($_POST['month']!='Select Month') && ($_POST['week']!=NULL)){
     echo '<script type="text/javascript"> alert("Please select either month or week")</script>';
  }
  else if(isset($_POST['show']))
  {
    echo '<script type="text/javascript"> alert("Please select name, month or week")</script>';
  }
  ?>
</body>
</html>


