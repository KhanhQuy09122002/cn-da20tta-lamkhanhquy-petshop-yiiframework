<h3 style="text-align: center;" >Tổng doanh thu</h3>
<p style="text-align: center;" >Tổng doanh thu: <?= number_format($totalRevenue, 0, ',', '.') ?> VND</p>
<br>
<h3 style="text-align: center;" >Các sản phẩm bán chạy nhất</h3>
<table class="table-style">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Số lượng đã bán</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productsInfo as $product): ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['quantity'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>

<h3 style="text-align: center;"  >Các sản phẩm sắp hết hàng</h3>
    <table class="table-style">
        <thead>
            <tr>
                <th>Tên sản phẩm</th>
                <th>Số lượng tồn kho</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productsRunningLow as $product): ?>
                <tr>
                    <td><?= $product->product_name ?></td>
                    <td><?= $product->product_quantity ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>