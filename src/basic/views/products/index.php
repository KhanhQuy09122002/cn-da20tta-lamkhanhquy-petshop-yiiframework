<?php

use app\models\Products;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ProductsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Quản lý sản phẩm';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h2 style="text-align: center;"><?= Html::encode($this->title) ?></h2><br>

    <p>
        <?= Html::a('Thêm sản phẩm', ['create'], ['class' => 'btn btn-success']) ?>
        
    </p>
   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'product_id',
            'label' => 'Mã sản phẩm',
        ],
        [
            'attribute' => 'product_code',
            'label' => 'Mã code sản phẩm',
        ],
        [
            'attribute' => 'product_name',
            'label' => 'Tên sản phẩm',
        ],
        [
            'attribute' => 'product_price',
            'label' => 'Giá sản phẩm',
        ],
        [
            'attribute' => 'product_image',
            'format' => 'html',
            'label' => 'Hình ảnh',
            'value' => function ($model) {
                return Html::img($model->product_image, ['width' => '100px']);
            },
        ],
        // Các cột khác ở đây
        
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Products $model, $key, $index, $column) {
                return Url::toRoute([$action, 'product_id' => $model->product_id]);
            }
        ],
    ],
    'summary' => 'Hiển thị {begin} - {end} của {totalCount} mục',
]); ?>


</div>
