<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $order_id
 * @property string $order_date
 * @property int $user_id
 * @property int $totals
 * @property int $status
 *
 * @property Order[] $orders
 * @property Users $user
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_date', 'user_id', 'status','totals'], 'required'],
            [['order_date'], 'safe'],
            [['user_id', 'status','totals'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_date' => 'Order Date',
            'user_id' => 'User ID',
            'totals'=>'Totals',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(OrderDetails::class, ['order_id' => 'order_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['user_id' => 'user_id']);
    }
    //test
    public function getUsers()
{
    return $this->hasOne(Users::className(), ['user_id' => 'user_id']);
}

public function getOrderDetails()
{
    return $this->hasMany(OrderDetails::className(), ['order_id' => 'order_id']);
}
}
