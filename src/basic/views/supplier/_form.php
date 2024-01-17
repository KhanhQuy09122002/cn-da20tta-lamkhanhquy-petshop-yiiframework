<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Supplier $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sup_id')->textInput() ?>

    <?= $form->field($model, 'sup_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success','style' => 'width: 70px;']) ?>
        <?= Html::a('Trở lại', ['/supplier'], ['class' => 'btn btn-success','style' => 'width: 70px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
