<?php

use app\models\OrderDetails;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\OrdersDetailsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Chi tiết đơn hàng';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-details-index">

<h2 style="text-align: center;"><?= Html::encode($this->title) ?></h2><br>

   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'id',
            'label' => 'ID',
        ],
        [
            'attribute' => 'order_id',
            'label' => 'ID Đơn hàng',
        ],
        [
            'attribute' => 'product_id',
            'label' => 'Tên sản phẩm',
            'value' => function ($model) {
                // Lấy thông tin sản phẩm từ product_id
                $product = \app\models\Products::findOne($model->product_id);
                return $product ? $product->product_name : 'Không có'; // Trả về tên sản phẩm hoặc giá trị mặc định nếu không tìm thấy
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
        //'status',
        [
            'class' => ActionColumn::className(),
            'template' => '{view}',
            'urlCreator' => function ($action, OrderDetails $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
             }
        ],
    ],
]); ?>



</div>
