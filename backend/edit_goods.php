<?php

$goods=$Goods->find($_GET['id']);

?>
<h1 class="ct">修改商品</h1>
<form action="api/save_goods.php" method='post' enctype="multipart/form-data">
<table class="all">
    <tr>
        <td class="ct tt">所屬大分類</td>
        <td class="pp"><select name="big" id="big"></select></td>
    </tr>
    <tr>
        <td class="ct tt">所屬中分類</td>
        <td class="pp"><select name="mid" id="mid"></select></td>
    </tr>
    <tr>
        <td class="ct tt">商品編號</td>
        <td class="pp"><span id="showNo"><?=$goods['no'];?></span></td>
    </tr>
    <tr>
        <td class="ct tt">商品名稱</td>
        <td class="pp"><input type="text" name="name" value="<?=$goods['name'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">商品價格</td>
        <td class="pp"><input type="text" name="price" value="<?=$goods['price'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">規格</td>
        <td class="pp"><input type="text" name="spec" value="<?=$goods['spec'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">庫存量</td>
        <td class="pp"><input type="text" name="qt" value="<?=$goods['qt'];?>"></td>
    </tr>
    <tr>
        <td class="ct tt">商品圖片</td>
        <td class="pp"><input type="file" name="img" value=""></td>
    </tr>
    <tr>
        <td class="ct tt">商品介紹</td>
        <td class="pp"><textarea name="intro" style="width:80%;height:50px"><?=$goods['intro'];?></textarea></td>
    </tr>
</table>
<div class="ct">
    <input type='hidden' name='id' value="<?=$goods['id'];?>">
    <input type="submit" value="修改">
    <input type="reset" value="重置">
    <input type="button" value="返回" onclick="location.href='?do=th'">
</div>
</form>


<script>

getBig()

$("#big").on("change",function(){
    getMid($("#big").val())
})
$("#mid").on("change",function(){
    getNo()
})


function getBig(){
    $.get("api/get_type.php",(list)=>{
        $("#big").html(list)
        $("#big option[value='<?=$goods['big'];?>']").prop('selected',true)
        getMid($("#big").val())
    })
}

function getMid(id){
    $.get("api/get_type.php",{'parent':id},(list)=>{
        $("#mid").html(list)
        $("#mid option[value='<?=$goods['mid'];?>']").prop('selected',true)

    })
}


</script>