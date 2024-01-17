<?php
use yii\helpers\Html;

$this->title = 'Đơn hàng của tôi';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <h4><?= Html::encode($this->title) ?></h4>

    <?php foreach ($orders as $order): ?>
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0" style="text-align: center;">Đơn hàng #<?= $order->order_id ?></h5>
            </div>
            <div class="card-body">
                <p class="mb-0"><strong>Ngày đặt hàng:</strong> <?= $order->order_date ?></p>

                <hr>
                 <!-- Thêm thông tin người dùng -->
                <p class="mb-0"><strong>Người đặt hàng:</strong> <?= $order->user->name ?></p>
                <p class="mb-0"><strong>Email:</strong> <?= $order->user->email ?></p>
                <p class="mb-0"><strong>Số điện thoại:</strong> <?= $order->user->phone ?></p>
                <p class="mb-0"><strong>Địa chỉ:</strong> <?= $order->user->address ?></p>
                <hr>
                <h6 class="mb-2">Chi tiết đơn hàng:</h6>
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

                <hr>

                <?php if (!empty($order->orderDetails)): ?>
                <p class="mb-0"><strong>Tổng tiền:</strong> <?= number_format($order->totals, 0, ',', '.') ?> VND</p>
            <?php else: ?>
                <p class="mb-0"><strong>Tổng tiền:</strong> 0 VND</p>
            <?php endif; ?>
                <p class="mb-0"><strong>Trạng thái:</strong>
    <?php
    switch ($order->status) {
        case 0:
            echo 'Đã duyệt';
            break;
        case 1:
            echo 'Đã giao';
            break;
        case 2:
            echo 'Tạm';
            break;
        default:
            echo 'Đã hủy';
    }
    ?>
</p>

                <?php if ($order->status == 0): ?>
                    <?= Html::a('Hủy Đơn', ['cancel-order', 'id' => $order->order_id], [
                        'class' => 'btn btn-danger mt-2',
                        'id' => 'cancelOrderBtn', // Thêm ID để có thể tương tác với JavaScript
                         'data-confirm' => 'Bạn có chắc chắn muốn hủy đơn hàng?', // Hiển thị hộp thoại xác nhận
                ]) ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
