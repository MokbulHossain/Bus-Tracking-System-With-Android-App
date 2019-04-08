<?php 

$server = "localhost";
$username = "shunnoso_bus";
$password = "sC7p21ik5X";
$database = "shunnoso_bus";
$con=mysqli_connect($server, $username, $password,$database) or die("<h1>Koneksi Mysql Error : </h1>" . mysqli_error());
@$email = $_GET['email'];
@$pass = $_GET['pass'];
	$sql="select * from driver_info WHERE email='$email' and password ='$pass'";

        $query_tampil_biodata = mysqli_query($con,$sql);
        $data_array = array();
       $data = mysqli_fetch_assoc($query_tampil_biodata);
       $data_array=$data;
 if(count($data)>0){
        $sql="select * from trip where driver_id =".$data['id'];
        $query_tampil_biodata = mysqli_query($con,$sql);
        $data_array =$data+ mysqli_fetch_assoc($query_tampil_biodata);
        echo "[" . json_encode($data_array) . "]";
        }
        else{echo json_encode($data['error']='incorrect email and password');}
        
	?>