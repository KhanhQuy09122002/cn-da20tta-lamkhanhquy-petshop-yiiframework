<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Đổi mật khẩu';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-resetpassword">
    <h3 style="text-align: center;"><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'currentPassword')->passwordInput(['maxlength' => true])->label('Mật khẩu hiện tại') ?>
    <?= $form->field($model, 'newPassword')->passwordInput(['maxlength' => true])->label('Mật khẩu mới') ?>
    <?= $form->field($model, 'confirmNewPassword')->passwordInput(['maxlength' => true])->label('Xác nhận mật khẩu mới') ?>
    
    <div class="form-group">
        <?= Html::submitButton('Đổi mật khẩu', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

