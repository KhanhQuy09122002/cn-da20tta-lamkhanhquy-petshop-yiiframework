<?php

use app\models\Categories;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CategoriesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Quản lý Danh mục';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

<h2 style="text-align: center;"><?= Html::encode($this->title) ?></h2><br>

    <p>
        <?= Html::a('Thêm Danh mục', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'cate_id',
            'label' => 'Mã danh mục',
        ],
        [
            'attribute' => 'cate_name',
            'label' => 'Tên danh mục',
        ],
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Categories $model, $key, $index, $column) {
                return Url::toRoute([$action, 'cate_id' => $model->cate_id]);
            }
        ],
    ],
    'summary' => 'Hiển thị {begin} - {end} của {totalCount} mục',
]); ?>



</div>
