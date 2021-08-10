<?php include_once "../base.php";

$db=new DB($_GET['table']);
$acc=$_GET['acc'];
$pw=$_GET['pw'];
$chk=$db->count(['acc'=>$acc,'pw'=>$pw]);
if($chk){
    echo $chk;
    switch($_GET['table']){
        case 'mem':
            $_SESSION['mem']=$acc;
        break;
        case 'admin':
            $_SESSION['admin']=$acc;
        break;
    }
}