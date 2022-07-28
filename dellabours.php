<!DOCTYPE html>
<?php
$server="fdb32.awardspace.net";
$userid ="3992918_pratik";
$Password = "Xcen@123";
$myDB = "3992918_pratik";
$con = mysqli_connect($server,$userid,$Password,$myDB);
if (mysqli_connect_errno()) {
# code...
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<!-- Put you mysqli connection here ................ -->
<title>PHP SAMPLE SYSTEM</title>
<header>
<h1 align="center">Populate Drop Down List From Database Using PHP and MySQLi</h1>
</header>
<!-- Put your style layout here...... -->
<style type="text/css">
#box{
width: 100%;
}
.column {
width: 33.33%;
display: inline-block;
}
.form{
padding: 2px;
width: 100%;
display: inline-block;
}
.first-column {
display: inline-block;
width: 100px;
height: 2px;
margin: 2px;
position: inherit;
}
.second-column{
display: inline-block;
width: 150px;
height: 2px;
margin: 2px;
position: inherit;
}
select {
width: 150px;
font-size: 12px;
height: 25px;
padding: 4px
}
.clear{
clear: left;
height: 15px;
}
</style>
<body>
<div id="box">
<div class="column"></div>
<div class="column">
<div class="clear"></div>
<label class="first-column ">Select a Book:</label><div class="clear"></div>
<div class="clear"></div>
</div>
<div class="column"></div>
</div>
<?php 
echo '<select>
<option>Select</option>';
$sqli = "SELECT * FROM employees";
$result = mysqli_query($con, $sqli);
while ($row = mysqli_fetch_array($result)) {
echo '<option>'.$row['name'].'</option>';
}
echo '</select>';
?>
</body>
</html>