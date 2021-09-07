<?php include_once "../base.php";

$data['head']=['姓名','會員帳號','註冊日期','操作'];
    $mems=$Mem->all();
    foreach($mems as $mem){
        $data['rows'][]=[
            $mem['id'],
            $mem['name'],
            $mem['acc'],
            mb_substr($mem['regdate'],0,10),
            ['edit','del']
        ];
    }
echo json_encode($data);

