<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Categories $model */

//$this->title = $model->cate_id;
//$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="categories-view">

    <h2 style="text-align: center;"> Xem Thông tin Danh mục </h2><br>

    <p>
        <?= Html::a('Cập nhật', ['update', 'cate_id' => $model->cate_id], ['class' => 'btn btn-primary','style' => 'width: 100px;']) ?>
        <?= Html::a('Xóa', ['delete', 'cate_id' => $model->cate_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
                
            ],
            'style' => 'width: 100px;',
            
        ]) ?>
        <?= Html::a('Quay lại', ['/categories'], ['class' => 'btn btn-success','style' => 'width: 100px;']) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'Mã danh mục',
            'attribute' => 'cate_id',
        ],
        [
            'label' => 'Tên danh mục',
            'attribute' => 'cate_name',
        ],
    ],
]) ?>


</div>
