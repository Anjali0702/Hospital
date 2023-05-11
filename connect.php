<?php
$servername="localhost";
$username="root";
$pass="";
$conn=new mysqli($servername,$username,$pass);
if($conn->connect_error){
    die("connection error".$conn->connect_error);
}