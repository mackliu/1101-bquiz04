<?php include_once "../base.php";

$data['head']=['訂單編號','金額','會員帳號','姓名','下單時間','操作'];
$ords=$Ord->all();
    foreach($ords as $ord){
        $data['rows'][]=[
                         $ord['id'],
                         $ord['no'],
                         $ord['total'],
                         $ord['acc'],
                         $ord['name'],
                         mb_substr($ord['orddate'],0,10),
                         ['del']];

    }

echo json_encode($data);

