
<h2>{{ goodsList.nav }}</h2>

<table class="all" v-for="goods in goodsList.goods_list">
        <tr class="pp">
            <td width="40%" height="150px">    
                <a :href="'?do=detail&id='+goods.id"><img :src="'img/'+goods.img" style="width:80%;height:80%"></a>
            </td>
            <td>
                <div class="tt ct">{{ goods.name }}</div>
                <div>價錢:{{ goods.price }}
                <a style="float:right" :href="'?do=buycart&id='+goods.id+'&qt=1'"><img src="icon/0402.jpg"></a>
            </div>
                <div>規格:{{ goods.spec }}</div>
                <div>簡介:{{ goods.intro }}...</div>
            </td>
        </tr>
    </table>

