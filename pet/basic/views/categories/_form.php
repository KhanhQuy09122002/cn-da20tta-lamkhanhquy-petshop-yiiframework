<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Categories $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cate_id')->textInput()->label('Mã danh mục') ?>

    <?= $form->field($model, 'cate_name')->textInput(['maxlength' => true])->label('Tên danh mục') ?>


    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success','style' => 'width: 70px;']) ?>
        <?= Html::a('Trở lại', ['/categories'], ['class' => 'btn btn-success','style' => 'width: 70px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
