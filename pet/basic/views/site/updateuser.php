
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Cập nhật thông tin ';

?>

<div class="site-updateuser">
    <h3 style="text-align: center;"><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('Tên người dùng') ?>
<?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Họ tên') ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email') ?>
<?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('Số điện thoại') ?>
<?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('Địa chỉ') ?>

<div>
<?= Html::a('Đổi mật khẩu ? ', ['/site/resetpassword'], ['style' => 'text-decoration: none;']) ?><br>
</div>
    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-primary']) ?>
        <?= Html::submitButton('Trở lại', ['class' => 'btn btn-primary']) ?>
    </div>
               
                    
                   
              

    <?php ActiveForm::end(); ?>
</div>

