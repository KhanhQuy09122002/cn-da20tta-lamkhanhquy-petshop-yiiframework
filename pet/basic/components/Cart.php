<?php

namespace app\components;
use Yii;
class Cart
{
   /* Phương thức thêm vào giỏ hàng */
   public function add($data, $quantity=1)
   {
        Yii :: $app-> session['cart'][$data->product_id]=$data;
   }

}
?>