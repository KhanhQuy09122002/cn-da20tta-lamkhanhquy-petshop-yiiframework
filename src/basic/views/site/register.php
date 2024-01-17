<?php

use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;
?>
<div class="login-form">
    
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>
    <div class="container">
        <label>&nbsp;</label>
        <center><h4>Đăng ký thông tin khách hàng</h4></center>
        <div class="row">
        <div class="span6">
            <div class="form-group">
            <label>Tên đăng nhập</label>
            <input type="text" id="users-username" class="form-control" name="Users[username]" placeholder="User Name"required>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" id="users-username" class="form-control" name="Users[password]" placeholder="Password"required>
            </div>
            <div class="form-group">
                <label>Họ tên</label>
                <input type="text" id="users-username" class="form-control" name="Users[name]" placeholder="Name"required>
            </div>
           
            <div class="form-group">
                <label>Email</label>
                <input type="text" id="users-username" class="form-control" name="Users[email]" placeholder="Email"required>
            </div>
         </div>
         <div class="span6">
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" id="users-username" class="form-control" name="Users[address]" placeholder="Địa chỉ"required>
            </div>
            
            <div class="form-group">
                <label>Điện thoại</label>
                <input type="text" id="users-username" class="form-control" name="Users[phone]" placeholder="Điện thoại"required>
            </div>
            <input type="text" id="users-username" class="form-control" name="Users[role]" value="1" hidden="true" style="display: none;">
            <input type="text" id="users-username" class="form-control" name="Users[status]" value="1" hidden="1" style="display: none;" >
            <input type="text" id="users-username" class="form-control" name="register" value="1" hidden="1" style="display: none;">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Đăng ký</button>
            </div>
        </div>
    </div>
     
    <div class="register-link m-t-15 text-center">
    <?= Html::a('Trở lại', ['/site/login'], ['style' => 'text-decoration: none;']) ?>
    </div>
    </div>

<?php ActiveForm::end(); ?>

</div>