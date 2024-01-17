<?php

use app\models\Orders;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\OrdersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Quản lý đơn hàng';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

<h2 style="text-align: center;"><?= Html::encode($this->title) ?></h2><br>

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'order_id',
            'label' => 'ID Đơn Hàng',
        ],
        [
            'attribute' => 'order_date',
            'label' => 'Ngày Đặt Hàng',
        ],
        [
            'attribute' => 'user_id',
            'label' => 'Tên Người Dùng',
            'value' => function ($model) {
                $user = \app\models\User::findOne($model->user_id);
                return $user ? $user->username : 'Không có'; // Trả về tên người dùng hoặc giá trị mặc định nếu không tìm thấy
            },
        ],
        [
            'attribute' => 'totals',
            'label' => 'Tổng Tiền',
        ],
        [
            'attribute' => 'status',
            'label' => 'Trạng Thái',
            'value' => function ($model) {
                return $model->status == 0 ? 'Đã duyệt' : ($model->status == 1 ? 'Đã giao' : 'Đã hủy'); // Kiểm tra và trả về văn bản tương ứng với trạng thái
            },
        ],
        [
            'class' => ActionColumn::className(),
            'template' => '{view},{update}',
            'urlCreator' => function ($action, Orders $model, $key, $index, $column) {
                return Url::toRoute([$action, 'order_id' => $model->order_id]);
             },
            
        ],
    ],
]); ?>


</div>
