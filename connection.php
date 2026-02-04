<?php
$servername="localhost";
$username= "root";
$password="";
$database="Sportify Arena";

$conn=mysqli_connect($servername,$username,$password,$database); 

if($conn)
{
  
}
else {
    echo "not connected successfully";
}