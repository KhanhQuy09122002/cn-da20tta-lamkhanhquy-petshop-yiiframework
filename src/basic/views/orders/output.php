<?php foreach ($orders as $order): ?>
    <?php if ($order->status == 0 || $order->status == 1): ?>
        <div class="invoice">
            <div class="invoice-header">
                <h2 class="invoice-title">Hóa đơn #<?= $order->order_id ?></h2>
                <p class="invoice-date">Ngày đặt hàng: <?= $order->order_date ?></p>
            </div>
            <div class="customer-info">
                <h3>Thông tin khách hàng:</h3>
                <p><strong>Tên:</strong> <?= $order->user->name ?></p>
                <p><strong>Email:</strong> <?= $order->user->email ?></p>
                <p><strong>Địa chỉ:</strong> <?= $order->user->address ?></p>
            </div>
            <div class="order-details">
                <h3>Chi tiết đơn hàng:</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order->orderDetails as $detail): ?>
                            <tr>
                                <td><?= $detail->product->product_name ?></td>
                                <td><?= $detail->quantity ?></td>
                                <td><?= number_format($detail->product->product_price, 0, ',', '.') ?> VND</td>
                                <td><?= number_format($detail->total, 0, ',', '.') ?> VND</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="invoice-total">
                <p><strong>Tổng cộng: </strong><?= number_format($order->totals, 0, ',', '.') ?> VND</p>
                <a href="<?= Yii::$app->urlManager->createUrl(['order/pdf', 'id' => $order->order_id]) ?>" class="btn btn-primary">Xuất PDF</a>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
