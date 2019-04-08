<?php 

$server = "localhost";
$username = "shunnoso_bus";
$password = "sC7p21ik5X";
$database = "shunnoso_bus";
$con=mysqli_connect($server, $username, $password,$database) or die("<h1>Koneksi Mysql Error : </h1>" . mysqli_error());
@$leti = $_GET['leti'];
@$longi = $_GET['longi'];
@$bus_id = $_GET['bus_id'];
	$sql="update bus set Latitude='".$leti."',Longitude ='".$longi."' WHERE id='".$bus_id."'";
	$query_tampil_biodata = mysqli_query($con,$sql);
  return null;
        
	?>