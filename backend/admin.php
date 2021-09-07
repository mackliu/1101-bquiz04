<div class="ct"><button onclick="location.href='?do=add_admin'">新增管理員</button></div>
<backend-list-table 
    :head="ListData.head" 
    :rows="ListData.rows"
    :mod="mod">
</backend-list-table>

<div class="ct"><button onclick="location.href='index.php'">返回</button></div>