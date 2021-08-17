<?php include_once "../base.php";

//$parent=$_GET['parent']??0;
$parent=$_POST['parent']??0;

$rows=$Type->all(['parent'=>$parent]);
foreach ($rows as $key => $row) {
        echo "<option value='{$row['id']}'>{$row['name']}</option>";
}
