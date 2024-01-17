<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Users $model */

$this->title = 'Xem thông tin người dùng';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

<h2 style="text-align: center;"> Xem Thông tin Người dùng </h2><br>

    <p>
        <?= Html::a('Update', ['update', 'user_id' => $model->user_id], ['class' => 'btn btn-primary','style' => 'width: 100px;']) ?>
        <?= Html::a('Delete', ['delete', 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
            'style' => 'width: 100px;'
        ]) ?>
        <?= Html::a('Quay lại', ['/users'], ['class' => 'btn btn-success','style' => 'width: 100px;']) ?>
    </p>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'Mã người dùng',
            'attribute' => 'user_id',
        ],
        [
            'label' => 'Tên người dùng',
            'attribute' => 'username',
        ],
     
        [
            'label' => 'Họ tên',
            'attribute' => 'name',
        ],
        [
            'label' => 'Email',
            'attribute' => 'email',
            'format' => 'email',
        ],
        [
            'label' => 'Số điện thoại',
            'attribute' => 'phone',
        ],
        [
            'label' => 'Địa chỉ',
            'attribute' => 'address',
        ],
        [
            'label' => 'Vai trò',
            'attribute' => 'role',
            'value' => function ($model) {
                return $model->role == 1 ? 'Người dùng' : 'Admin';
            },
        ],
        [
            'label' => 'Trạng thái',
            'attribute' => 'status',
            'value' => function ($model) {
                return $model->status == 1 ? 'Không hoạt động' : 'Còn hoạt động';
            },
        ],
    ],
]) ?>

</div>
