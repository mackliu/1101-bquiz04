<?php include "../base.php";

$data=[];

$type=$_GET['type']??0;
if($type==0){
    $nav="全部商品";
    $rows=$Goods->all(['sh'=>1]);
}else{
    $nav="";
    $tt=$Type->find($type);
    if($tt['parent']==0){
        $nav=$tt['name'];
        $rows=$Goods->all(['big'=>$tt['id'],'sh'=>1]);
    }else{
        $tm=$Type->find($type);
        $tb=$Type->find($tm['parent']);
        $nav=$tb['name'] . " > " . $tm['name'];
        $rows=$Goods->all(['mid'=>$tm['id'],'sh'=>1]);
    }
}

$data['nav']=$nav;

foreach($rows as $row){

$data['goods_list'][]=[
    "id"=>$row['id'],
    "img"=>$row['img'],
    "name"=>$row['name'],
    "price"=>$row['price'],
    "spec"=>$row['spec'],
    "intro"=>mb_substr($row['intro'],0,25),
    
    ];
  }

  echo json_encode($data);


