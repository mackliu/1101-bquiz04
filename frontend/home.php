<?php
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


?>

<h2><?=$nav;?></h2>

<?php 


foreach($rows as $row){
?>

<table class="all">
    <tr class="pp">
        <td width="40%" height="150px">    
            <img src="img/<?=$row['img'];?>" style="width:80%;height:80%">
        </td>
        <td>
            <div class="tt ct"><?=$row['name'];?></div>
            <div>價錢:<?=$row['price'];?></div>
            <div>規格:<?=$row['spec'];?></div>
            <div>簡介:<?=mb_substr($row['intro'],0,25);?>...</div>

        </td>
    </tr>
</table>


<?php
}
?>