<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $sup_id
 * @property string $sup_name
 *
 * @property Products[] $products
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sup_id', 'sup_name'], 'required'],
            [['sup_id'], 'integer'],
            [['sup_name'], 'string', 'max' => 50],
            [['sup_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sup_id' => 'Sup ID',
            'sup_name' => 'Sup Name',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Products::class, ['sup_id' => 'sup_id']);
    }
}
