<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $product_id
 * @property string $product_code
 * @property string $product_name
 * @property float $product_price
* @property string $product_image
 * @property string $describe
 * @property int $product_quantity
 * @property int $cate_id
 * @property string $status
 *
 * @property Categories $cate
 */

class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
  
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public $file;
    public function rules()
    {
        return [
            [['product_id', 'product_code', 'product_name', 'product_price', 'describe', 'product_image','product_quantity', 'cate_id', 'status'], 'required'],
            [['product_id', 'product_quantity', 'cate_id'], 'integer'],
            [['product_price'], 'number'],
            [['describe'], 'string'],
            [['product_code'], 'string', 'max' => 12],
            [['product_image'], 'string', 'max' => 30],
            [['product_id'], 'unique'],
            [['product_name'], 'string', 'max' => 50],
            
            [['cate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::class, 'targetAttribute' => ['cate_id' => 'cate_id']],
           
            [['file'], 'file','extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_code' => 'Product Code',
            'product_name' => 'Product Name',
            'product_price' => 'Product Price',
            'product_image' => 'Product Image',
            'describe' => 'Describe',
            'product_quantity' => 'Product Quantity',
            'cate_id' => 'Cate ID',
            'status' => 'Status',
          
            
        ];
    }

    /**
     * Gets query for [[Cate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::class, ['cate_id' => 'cate_id']);
    }
    public function getCategoryName()
    {
        $category = Categories::findOne($this->cate_id); // Giả sử bạn có một mối quan hệ đơn giản giữa cate_id và bảng Categories
        return $category ? $category->cate_name : 'Unknown'; // Trả về tên danh mục hoặc một giá trị mặc định nếu không tìm thấy
    }
    public function getSup()
    {
        return $this->hasOne(Supplier::class, ['sup_id' => 'sup_id']);
    }
    public function getSupName()
    {
        $sup = Supplier::findOne($this->sup_id); // Giả sử bạn có một mối quan hệ đơn giản giữa cate_id và bảng Categories
        return $sup ? $sup->sup_name : 'Unknown'; // Trả về tên danh mục hoặc một giá trị mặc định nếu không tìm thấy
    }
    
}
