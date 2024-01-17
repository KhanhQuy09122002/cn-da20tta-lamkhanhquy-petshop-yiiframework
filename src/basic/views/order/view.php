<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Order $model */

$this->title = $model->id;

\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

<h2 style="text-align: center;"> Xem Thông tin Đơn hàng </h2><br>

    <p>
       
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'Mã đơn hàng',
            'attribute' => 'id',
        ],
        [
            'label' => 'Ngày lặp đơn',
            'attribute' => 'order_date',
        ],
        [
            'label' => 'Tên người dùng',
            'value' => function ($model) {
                return $model->user->username; // Thay 'username' bằng trường chứa tên người dùng trong model User
            },
        ],
        [
            'label' => 'Tên sản phẩm',
            'value' => function ($model) {
                return $model->product->product_name; // Thay 'name' bằng trường chứa tên sản phẩm trong model Product
            },
        ],
        [
            'label' => 'Số lượng',
            'attribute' => 'quantity',
        ],
        [
            'label' => 'Tổng cộng',
            'attribute' => 'total',
        ],
        [
            'label' => 'Trạng thái',
            'attribute' => 'status',
            'value' => function ($model) {
                if ($model->status == 0) {
                    return 'Đã duyệt';
                } elseif ($model->status == 2) {
                    return 'Đã giao';
                } else {
                    return 'Trạng thái không xác định';
                }
            },
        ],
    ],
]) ?>

</div>
