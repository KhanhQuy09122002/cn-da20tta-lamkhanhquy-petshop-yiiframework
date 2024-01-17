<?php
use yii\helpers\Html;
$this->title = 'Giỏ hàng';
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/js/cart.js', ['depends' => [\yii\web\JqueryAsset::class]]);
?>

<!-- Hiển thị danh sách sản phẩm trong giỏ hàng -->
<table class="table">
    <thead>
        <tr>
            <th>Sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng cộng</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <?php if (isset($cartItems)&& !empty($cartItems) ) : ?>
 <?php foreach ($cartItems as $item) : ?>
           
                <tr>
                    <td><?= $item->product->product_name ?></td>
                    <td><?= Yii::$app->formatter->asDecimal($item->product->product_price, 0) ?> VND</td>
                    <td>
                        
                   
            <input type="hidden" name="itemId" value="<?= $item->id ?>">
            <input type="number" min="1" name="quantity" value="<?= $item->quantity ?>">
    
            <td><?= Yii::$app->formatter->asDecimal($item->product->product_price * $item->quantity, 0) ?> VND</td>


    
                    </td>
                    <td><?= Html::a('Cập nhật', ['order-details/updatecart','item_id' => $item->id], ['class' => 'btn btn-success','style' => 'width: 100px;']) ?>
</td>
                    <td><?= Html::a('Xóa', ['order-details/clear','item_id' => $item->id], ['class' => 'btn btn-danger','style' => 'width: 100px;']) ?>
</td>

                </tr>
                <?php endforeach; ?>
                <?php else : ?>
            <tr>
                <td colspan="5">Không có sản phẩm trong giỏ hàng</td>
            </tr>
        
            <?php endif; ?>


    </tbody>
</table>

<!-- Tính tổng số tiền -->
<div>
    <?php if (isset($totalAmount)) : ?>
        <h4>Tổng tiền: <?= Yii::$app->formatter->asDecimal($totalAmount, 0) ?> VND</h4>
    <?php endif; ?>
</div>


<br>
<div>

<div>   
                    <?= Html::button('Tiếp tục mua hàng', ['class' => 'btn btn-primary', 'onclick' => 'window.location.href="' . Yii::$app->urlManager->createUrl(['/site/index']) . '"']) ?>
                   
</div>



