<?php
//include_once "../base.php";
session_start();
$id=$_POST['id'];
unset($_SESSION['cart'][$id]);


?>