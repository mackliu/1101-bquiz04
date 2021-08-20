



<?php 

$rows=$Goods->all(['sh'=>1]);
foreach($rows as $row){
?>

<table class="all">
    <tr>
        <td width="40%" height="150px">    
            <img src="img/<?=$row['img'];?>" style="width:80%;height:80%">
        </td>
        <td>
            <div class="pp ct"><?=$row['name'];?></div>
            <div>價錢:<?=$row['price'];?></div>
            <div>規格:<?=$row['spec'];?></div>
            <div>簡介:<?=mb_substr($row['intro'],0,25);?>...</div>

        </td>
    </tr>
</table>


<?php
}
?>