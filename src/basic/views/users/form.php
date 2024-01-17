<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Users $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

  

    <?= $form->field($model, 'role')->dropDownList(
    [
        1=>'Người dùng',
        0=>'Admin'
    ],
    [
        'prompt'=>'Chọn vai trò'
    ],
    ['maxlength' => true])->label('Vai trò') ?>

<?= $form->field($model, 'status')->dropDownList(
    [
        0=>'Còn hoạt động',
        1=>'Không hoạt động'
    ],
    [
        'prompt'=>'Chọn trạng thái'
    ],
    ['maxlength' => true])->label('Trạng thái') ?>

   
    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success','style' => 'width: 70px;']) ?>
        <?= Html::a('Trở lại', ['/users'], ['class' => 'btn btn-success','style' => 'width: 70px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>