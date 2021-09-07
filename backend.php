<?php include_once "base.php";?>
<?php

if(isset($_SESSION['admin'])){
    $user=$Admin->find(['acc'=>$_SESSION['admin']]);
    $mpr=unserialize($user['pr']);
}else{
    echo "非法登入";
    exit();
}

?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0057)?do=admin -->
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

    <div id="main">
        <div id="top">
            <a href="index.php">
                <img src="./icon/0416.jpg">
            </a>
            <img src="./icon/0417.jpg">
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
                <a href="?do=admin">管理權限設置</a>
                <?=(in_array(1,$mpr))?"<a href='?do=th'>商品分類與管理</a>":'';?>
                <?=(in_array(2,$mpr))?"<a href='?do=order'>訂單管理</a>":'';?>
                <?=(in_array(3,$mpr))?"<a href='?do=mem'>會員管理</a>":'';?>
                <?=(in_array(4,$mpr))?"<a href='?do=bot'>頁尾版權管理</a>":'';?>
                <?=(in_array(5,$mpr))?"<a href='?do=news'>最新消息管理</a>":'';?>
                <a href="javascript:location.href='frontend/logout.php'" style="color:#f00;" >登出</a>
            </div>
        </div>
        <div id="right">

            <?php
        $do=$_GET['do']??'admin';
        $file='backend/'.$do.".php";
        if(file_exists($file)){
                include $file;
        }else{
                include 'backend/admin.php';
        }

        ?>
        </div>
        <div id="bottom" style="line-height:70px; color:#FFF; background:url(icon/bot.png);" class="ct">
        <?=$Bot->find(1)['bot'];?> </div>
    </div>

</body>

</html>


<script>

    const main={
        data(){
            const ListData={}
            const mod='';
            return { ListData ,mod}
        },

        mounted(){
            let url=location.href
            let mod
            if(url.indexOf("?")>=0){
                mod=url.split("?")[1].split("=")[1];
            }
            this.mod=mod
            let api='';
            switch(mod){
                case 'admin':
                    api="api/get_admin_list.php";
                break;
                case 'order':
                    api="api/get_order_list.php";
                break;
                case 'mem':
                    api="api/get_mem_list.php";
                break;
                
            }
            $.getJSON(api,(res)=>{
                this.ListData=res
                console.log(api,res)
            })
        }
    }
    let app=Vue.createApp(main)
    app.component('BackendListTable', {
    props:['head','rows','mod'],
    data(){
        const contents=new Array();
        const lastItem=new Array();
        const firstId=new Array();
        return {
            contents,lastItem,firstId
        }
    },
    methods:{
        oprator(m,id){
            switch(m){
                case 'edit':
                    this.edit(this.mod,id)
                break;
                case 'del':
                    this.del(this.mod,id)
                break;
            }
        },
        del(table,id){
            console.log('刪除'+table+id)
            if(table=='order'){
                table='ord'
            }
            console.log(table,id)
            $.post('api/del.php',{table,'id':id[0]},(res)=>{
                console.log(res)
                this.rows.forEach((row,idx)=>{
                if(row[0]==id){
                    this.contents.splice(idx,1)
                    this.lastItem.splice(idx,1)
                    this.firstId.splice(idx,1)
                    this.rows.splice(idx,1)
                }
            })
            })
        },
        edit(table,id){
            console.log('編輯'+table+id)
            let file='';
            switch(table){
                case "admin":
                    file='?do=edit_admin&id='+id
                break;
                case "mem":
                    file='?do=edit_mem&id='+id
                break;
            
            }
            location.href=file
        }

    },
    watch:{
        rows:function(){
            this.rows.forEach((item)=>{
                this.lastItem.push(item[item.length-1])
                this.firstId.push(item.slice(0,1))
                this.contents.push(item.slice(1,-1))
            })
           //console.log(this.lastItem,this.firstId,this.contents)
        }
    },
    template: `
    <table class='all'>
        <tr class='tt ct'>
            <td v-for="h in head">{{ h }}</td>
            
        </tr>
        <tr class='pp ct' v-for='(r,idx) in contents' :key='idx'>
            <td v-for='d in r'>{{ d }}</td>
            <td>
                <button v-for="btn in lastItem[idx]" @click="oprator(btn,firstId[idx])">{{ btn }}</button>
            </td>
        </tr>
    </table>
        `
    })

    app.mount("#main");
</script>