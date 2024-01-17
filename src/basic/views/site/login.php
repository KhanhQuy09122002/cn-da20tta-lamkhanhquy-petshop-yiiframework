<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Đăng nhập';
//$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <div class="card border-primary mb-3" style="max-width: 30rem;">
        <div class="card-header bg-primary text-white"> <!-- Header -->
            <h3 class="card-title text-center">Đăng nhập</h3>
        </div>
        <div class="card-body"> <!-- Body -->
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->label('Tên đăng nhập', ['style' => 'white-space: nowrap;'])->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->label('Mật khẩu', ['style' => 'white-space: nowrap;'])->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox([
                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
            ]) ?>

            <div class="form-group">
                <div class="text-center">
                    <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <p> Bạn chưa có tài khoản?</p>
                    <?= Html::a('Đăng ký', ['/site/register'], ['style' => 'text-decoration: none;']) ?><br>
                    <?= Html::a('Trở lại', ['/site/index'], ['style' => 'text-decoration: none;']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
