<?php include_once "../base.php";

$db=new DB($_GET['table']);
echo $db->count(['acc'=>$_GET['acc']]);
