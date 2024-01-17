<?php

namespace app\models;

use yii\base\Model;
use app\models\User; // Import model User hoặc tùy thuộc vào cách bạn thiết kế hệ thống xác thực người dùng

class ResetPasswordForm extends Model
{
    public $currentPassword;
    public $newPassword;
    public $confirmNewPassword;

    public function rules()
    {
        return [
            [['currentPassword', 'newPassword', 'confirmNewPassword'], 'required'],
            ['currentPassword', 'validateCurrentPassword'],
            ['confirmNewPassword', 'compare', 'compareAttribute' => 'newPassword', 'message' => 'Mật khẩu xác nhận không khớp.'],
        ];
    }

    public function validateCurrentPassword($attribute, $params)
    {
        $user = User::findOne(['username' => \Yii::$app->user->identity->username]);
        if (!$user || !$user->validatePassword($this->currentPassword)) {
            $this->addError($attribute, 'Mật khẩu hiện tại không chính xác.');
        }
    }
}
