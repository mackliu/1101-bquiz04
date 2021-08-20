<h2 class="ct">填寫資料</h2>

<?php 

$mem=$Mem->find(['acc'=>$_SESSION['mem']]);

?>

<form action="api/checkout.php" method="post">
    <table class="all" style="margin:0 auto">
        <tr>
            <td class="tt ct">登入帳號</td>
            <td class="pp">
                <?=$mem['acc'];?>
                <input type="hidden" name="acc" value="<?=$mem['acc'];?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" value="<?=$mem['name'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp"><input type="text" name="email" value="<?=$mem['email'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡地址</td>
            <td class="pp"><input type="text" name="addr" value="<?=$mem['addr'];?>"></td>
        </tr>
        <tr>
            <td class="tt ct">聯絡電話</td>
            <td class="pp"><input type="text" name="tel" value="<?=$mem['tel'];?>"></td>
        </tr>
    </table>
    <table class="all ct" style="margin:0 auto">
    <tr class="tt">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php 
    $total=0;
    foreach($_SESSION['cart'] as $id => $qt){
        $goods=$Goods->find($id);
    ?>
    <tr class="pp" id='g<?=$goods['id'];?>'>
        <td><?=$goods['name'];?></td>
        <td><?=$goods['no'];?></td>
        <td><?=$qt;?></td>
        <td><?=$goods['price'];?></td>
        <td><?=($qt*$goods['price']);?></td>
    </tr>
    <?php

        $total=$total+($qt*$goods['price']);
        }
    ?>
</table>
<div class="all tt ct" style="margin:0 auto;padding:10px 0">總價:<?=$total;?></div>
<div class="ct">
    <input type="hidden" name="total" value="<?=$total;?>">
    <input type="submit" value="確定送出">
    <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
</div>
</form>

