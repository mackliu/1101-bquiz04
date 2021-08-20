<?php
$goods=$Goods->find($_GET['id']);
$big=$Type->find($goods['big'])['name'];
$mid=$Type->find($goods['mid'])['name'];
?>
<h2 class="ct"><?=$goods['name'];?></h2>
<table class="all">
    <tr class="pp">
        <td width="60%"><img src="img/<?=$goods['img'];?>" style="width:90%"></td>
        <td width="40%" style="padding:0">
        <div class="bb">分類:<?=$big.">".$mid;?></div>
        <div class="bb">編號:<?=$goods['no'];?></div>
        <div class="bb">價格:<?=$goods['price'];?></div>
        <div class="bb">詳細說明:<?=$goods['intro'];?></div>
        <div>庫存量:<?=$goods['qt'];?></div>

        </td>
    </tr>
</table>
<div class="all tt ct">
    購買數量: <input type="number" name="qt" id="qt" value="1" style="width:50px"><img src="icon/0402.jpg" id="submit">
</div>
<div class="ct">
    <button onclick="location.href='index.php'">返回</button>
</div>
<script>

$("#submit").on("click",()=>{
    location.href=`?do=buycart&id=<?=$_GET['id'];?>&qt=${$("#qt").val()}`;
})

</script>