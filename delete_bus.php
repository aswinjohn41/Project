<?php
session_start();

include 'connection.php';

if (!isset($_SESSION['login_user'])) {

  header("location: login.php");
}

$b_id=$_GET['bus_id'];

$query=mysqli_query($conn,"DELETE FROM route_tb WHERE id='$b_id'");

$_SESSION['delloc']='Bus details deleted';
header('location: route.php');

?>