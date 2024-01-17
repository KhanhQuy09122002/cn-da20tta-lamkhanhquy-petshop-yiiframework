<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Categories $model */

$this->title = 'Cập nhật Danh mục';
//$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->cate_id, 'url' => ['view', 'cate_id' => $model->cate_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categories-update">

<h2 style="text-align: center;"><?= Html::encode($this->title) ?></h2><br>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
