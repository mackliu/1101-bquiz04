<h2 class="ct">訂單管理</h2>

<table class="all">
    <tr class='tt ct'>
        <td>訂單號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
    <?php 
    $ords=$Ord->all();
    foreach($ords as $ord){
    ?>
    <tr class='pp'>
        <td><a href="?do=detail&id=<?=$ord['id'];?>"><?=$ord['no'];?></a></td>
        <td><?=$ord['total'];?></td>
        <td><?=$ord['acc'];?></td>
        <td><?=$ord['name'];?></td>
        <td><?=mb_substr($ord['orddate'],0,10);?></td>
        <td>
            <button onclick="del('ord',<?=$ord['id'];?>)">刪除</button>
        </td>
    </tr>
    <?php 

        }
    ?>
</table>