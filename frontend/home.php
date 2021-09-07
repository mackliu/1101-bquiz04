
<goods-nav :type="goodsList.nav"></goods-nav>

<goods-list v-for="goods in goodsList.goods_list" :key="goods.id" :goods="goods"></goods-list>

