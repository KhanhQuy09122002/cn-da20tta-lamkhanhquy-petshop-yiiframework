<?php

use app\models\Order;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\OrderSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Quản lý đơn hàng';

?>
<div class="order-index">

<h2 style="text-align: center;"><?= Html::encode($this->title) ?></h2><br>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'id',
                'label' => 'Mã Đơn hàng',
            ],
            [
                'attribute' => 'order_date',
                'label' => 'Ngày lặp đơn',
            ],
            [
                'attribute' => 'user_id',
                'label' => 'Tên người dùng',
                'value' => function ($model) {
                    return $model->user->username; // Giả sử 'username' là trường chứa tên người dùng trong model User
                },
            ],
            [
                'attribute' => 'product_id',
                'label' => 'Tên sản phẩm',
                'value' => function ($model) {
                    return $model->product->product_name; // Giả sử 'name' là trường chứa tên sản phẩm trong model Product
                },
            ],
            
            [
                'attribute' => 'quantity',
                'label' => 'Số lượng',
            ],
            [
                'attribute' => 'total',
                'label' => 'Tổng cộng',
            ],
           
            [
                'label' => 'Trạng thái',
                'attribute' => 'status',
                'value' => function ($model) {
                    $statusList = [
                        0 => 'Đã duyệt',
                        2 => 'Đã giao',
                    ];
            
                    return $statusList[$model->status] ?? 'Trạng thái không xác định';
                },
            ],
           
            [
                'class' => ActionColumn::className(),
                'template' => '{view},{update}',
                'urlCreator' => function ($action, Order $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
        'summary' => 'Hiển thị {begin} - {end} của {totalCount} mục',
    ]); ?>


</div>
