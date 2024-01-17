<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Supplier $model */

$this->title = $model->sup_id;

\yii\web\YiiAsset::register($this);
?>
<div class="supplier-view">

<h2 style="text-align: center;"> Xem Thông tin Người nhà cung cấp </h2><br>

    <p>
        <?= Html::a('Cập nhật', ['update', 'sup_id' => $model->sup_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'sup_id' => $model->sup_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Mã Nhà cung cấp',
                'attribute' => 'sup_id',
            ],
            [
                'label' => 'Mã Nhà cung cấp',
                'attribute' => 'sup_name',
            ],
           
        ],
    ]) ?>

</div>
