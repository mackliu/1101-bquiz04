<?php include_once "../base.php";

$data['head']=['姓名','會員帳號','操作'];
    $ads=$Admin->all();
    foreach($ads as $ad){
        $data['rows'][]=[$ad['id'],$ad['acc'],str_repeat("*",strlen($ad['pw'])),['edit','del']];
    }

echo json_encode($data);