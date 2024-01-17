<?php

use app\models\Supplier;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\SupplierSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Nhà cung cấp';

?>
<div class="supplier-index">

<h2 style="text-align: center;"><?= Html::encode($this->title) ?></h2><br>

    <p>
        <?= Html::a('Thêm Nhà cung cấp', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => 'Mã nhà cung cấp',
                'attribute' => 'sup_id',
            ],
            [
                'label' => 'Tên Nhà cung cấp',
                'attribute' => 'sup_name',
            ],
           
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Supplier $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'sup_id' => $model->sup_id]);
                 }
            ],
        ],
        'summary' => 'Hiển thị {begin} - {end} của {totalCount} mục',
    ]); ?>


</div>
