<?php

use app\models\Users;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UsersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Quản lý Người dùng';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <h2 style="text-align: center;"><?= Html::encode($this->title) ?></h2><br>

    <p>
        <?= Html::a('Thêm người dùng', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'label' => 'Mã người dùng',
            'attribute' => 'user_id',
        ],
        [
            'label' => 'Tên người dùng',
            'attribute' => 'username',
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
        // Các cột khác ở đây
        
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Users $model, $key, $index, $column) {
                return Url::toRoute([$action, 'user_id' => $model->user_id]);
            }
        ],
    ],
    'summary' => 'Hiển thị {begin} - {end} của {totalCount} mục',
]); ?>

</div>
