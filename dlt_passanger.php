<?php
session_start();

include 'connection.php';

if (!isset($_SESSION['login_user'])) {

  header("location: login.php");
}

$b_id=$_GET['passanger_login_id'];

$query=mysqli_query($conn,"DELETE FROM passanger_tb WHERE login_id='$b_id'");

$_SESSION['delloc']='Passanger details deleted';
header('location: passanger.php');

?>