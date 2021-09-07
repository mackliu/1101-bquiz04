<?php include_once "base.php";?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>
    <script src="https://unpkg.com/vue@next"></script>

</head>

<body>
    <iframe name="back" style="display:none;"></iframe>
    <div id="main">
        {{ title }}
        <div id="top">
            <a href="?">
                <img src="./icon/0416.jpg">
            </a>
            <div style="padding:10px;">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php
                if(isset($_SESSION['mem'])){
                    echo "<a href='?do=logout'>登出</a> |";

                }else{
                    echo "<a href='?do=login'>會員登入</a> |";
                }
                ?>
                <?php
                if(isset($_SESSION['admin'])){
                    echo "<a href='backend.php'>返回管理</a> |";

                }else{
                    echo "<a href='?do=admin'>管理登入</a> |";
                }
                ?>
                
            </div>
            <marquee>年終特賣會開跑了&nbsp;&nbsp;&nbsp;情人節特惠活動</marquee>
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
            <div class='ww' v-for="menu in menus" :key="menu">
                <a :href="'?type='+menu.type">{{ menu.name }}({{menu.qt}})</a>
                <div class="s" v-if="menu.subs!==undefined">
                        <a v-for="sub in menu.subs" :href="'?type='+sub.type" :key='sub'>{{ sub.name }}({{sub.qt}})</a>
                </div>
            </div>
            
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right">

        <?php
        $do=$_GET['do']??'home';
        $file='frontend/'.$do.".php";
        if(file_exists($file)){
                include $file;
        }else{
                include 'frontend/home.php';
        }

        ?>

        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
        <?=$Bot->find(1)['bot'];?> </div>
    </div>

</body>

</html>

<script>

    const main={
        data(){
            let title='測試';
            let menus='';
            let acc='';
            let table='mem';
            let chkResult='';
            let goodsList={};
            return { title ,menus,acc,table ,chkResult,goodsList}
        },
        methods:{
            chkAcc(table){
            $.get("api/chk_acc.php",{'acc':this.acc,table},(res)=>{
                if(parseInt(res)==1 || this.acc=='admin'){
                    alert("帳號已被使用")
                }else{
                    alert("此帳號可使用")
                }
            })
            }
        },
        watch:{
            acc(newAcc,oldAcc){
                $.get("api/chk_acc.php",{'acc':newAcc,'table':this.table},(res)=>{
                if(parseInt(res)==1 || this.acc=='admin'){
                    this.chkResult='此帳號己被使用'
                }else{
                    this.chkResult='此帳號可使用'
                }
            })
            }
        },
        mounted(){
            
            $.get("api/get_menus.php",(res)=>{
                let menus=JSON.parse(res)
                this.menus=menus
            })

            $.getJSON("api/get_goods_list.php",(res)=>{
                this.goodsList=res
            })
        }
    }
    let app=Vue.createApp(main)

    app.component('goods-list',{
        data(){
            
        },
        template:`
        <table class="all">
        <tr class="pp">
            <td width="40%" height="150px">    
                <a href='?do=detail&id='><img src="img/" style="width:80%;height:80%"></a>
            </td>
            <td>
                <div class="tt ct"></div>
                <div>價錢:
                <a style="float:right" href='?do=buycart&id=&qt=1'><img src="icon/0402.jpg"></a>
            </div>
                <div>規格:</div>
                <div>簡介:...</div>
    
            </td>
        </tr>
    </table>
        `
    })

    app.mount("#main");
</script>