<?php

if(isset($_GET['id'])){
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];
}

if(!isset($_SESSION['mem'])){
    to("?do=login");
    exit();
}

echo "<h2 class='ct'>".$_SESSION['mem']."的購物車</h2>";


if(empty($_SESSION['cart'])){
    echo "<div class='ct'>購物車中尚無商品</div>";
}else{
    print_r($_SESSION['cart']);
}


?>