<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Products $model */

$this->title = 'Cập nhật sản phẩm ';
//$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-update">

<h2 style="text-align: center;"><?= Html::encode($this->title) ?></h2><br>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
