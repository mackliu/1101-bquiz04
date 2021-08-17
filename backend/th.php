<h1 class="ct">商品分類</h1>
<div class="ct">
    <form action="api/save_type.php" method="post">
        新增大分類<input type="text" name="name">
        <input type="submit" value="新增"></form>
</div>
<div class="ct">
    <form action="api/save_type.php" method="post">
        新增中分類<select name="parent" id="parent">
            <?php
                $bigs=$Type->all(['parent'=>0]);
                foreach ($bigs as $key => $value) {
                    echo "<option value='{$value['id']}'>{$value['name']}</option>";
                }
            ?>            
        </select>
        <input type="text" name="name">
        <input type="submit" value="新增"></form>
</div>
<div class="type-list">
<table class=all>
<?php
foreach ($bigs as $key => $big) { 
    echo "<tr class='tt'>";
    echo "<td>{$big['name']}</td>";
    echo "<td class='ct'>";
    echo "<button onclick='edit(this,{$big['id']})'>修改</button>";
    echo "<button onclick=del('type',{$big['id']})>刪除</button>";
    echo "</td>";
    echo "</tr>";

    $mids=$Type->all(['parent'=>$big['id']]);
    foreach ($mids as $key => $mid) {
        echo "<tr class='pp'>";
        echo "<td class='ct'>{$mid['name']}</td>";
        echo "<td class='ct'>";
        echo "  <button onclick='edit(this,{$mid['id']})'>修改</button>";
        echo "  <button onclick=del('type',{$mid['id']})>刪除</button>";
        echo "</td>";
        echo "</tr>";
    }
}

?>
</table>
</div>
<script>
function edit(dom,id){
    let name=$(dom).parent().prev().text()
    let str=prompt("請輸入你要修改的分類名稱",name)
    if(str!=null){
        $.post("api/save_type.php",{'name':str,id},()=>{
            $(dom).parent().prev().text(str)
        })
    }
}



</script>

<h1 class="ct">商品管理</h1>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>