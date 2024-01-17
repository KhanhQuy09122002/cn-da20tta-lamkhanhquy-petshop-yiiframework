<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Users $model */

$this->title = 'Cập nhật Người dùng';
//$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'user_id' => $model->user_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-update">

<h2 style="text-align: center;"><?= Html::encode($this->title) ?></h2><br>


    <?= $this->render('form', [
        'model' => $model,
    ]) ?>

</div>
