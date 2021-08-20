<?php include_once "../base.php";


$total=0;
foreach($_SESSION['cart'] as $id=>$qt){
    $goods=$Goods->find($id);
    $total=$total+$qt*$goods['price'];
}

echo "<div class='cart-total'>{$total}</div>";
echo "(".count($_SESSION['cart']).")";
echo "<a href='?do=buycart'>結帳</a>";
