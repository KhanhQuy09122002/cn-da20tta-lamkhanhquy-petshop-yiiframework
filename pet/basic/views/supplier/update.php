<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Supplier $model */

$this->title = 'Cập nhật Nhà cung cấp ';

?>
<div class="supplier-update">

<h2 style="text-align: center;"><?= Html::encode($this->title) ?></h2><br>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
