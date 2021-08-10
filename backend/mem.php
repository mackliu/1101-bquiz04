<h1 class="ct">會員管理</h1>

<table class="all">
    <tr class='tt ct'>
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php 
    $mems=$Mem->all();
    foreach($mems as $mem){
    ?>
    <tr class='pp'>
        <td><?=$mem['name'];?></td>
        <td><?=$mem['acc'];?></td>
        <td><?=mb_substr($mem['regdate'],0,10);?></td>
        <td>
            <button onclick="location.href='?do=edit_mem&id=<?=$mem['id'];?>'">修改</button>
            <button onclick="del('mem',<?=$mem['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php 

        }
    ?>
</table>