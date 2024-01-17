<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Giỏ hàng';
$this->params['breadcrumbs'][] = $this->title;
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
        <?php if (isset($cartItems) && !empty($cartItems)) : ?>
            <?php foreach ($cartItems as $item) : ?>
                <tr>
                    <td><?= $item->product->product_name ?></td>
                    <td><?= Yii::$app->formatter->asDecimal($item->product->product_price, 0) ?> VND</td>
                    <td>
                        
                        <input type="text" min="1" name="quantity" value="<?= $item->quantity ?>" onchange="updatecart(<?= $item->id ?>, this.value)">
                        <?= Html::a('Cập nhật', ['order-details/updatecart', 'item_id' => $item->id], ['class' => 'btn btn-success', 'style' => 'width: 100px;']) ?>
                    </td>
                    <td><?= Yii::$app->formatter->asDecimal($item->product->product_price * $item->quantity, 0) ?> VND</td>
                    <td><?= Html::a('Xóa', ['order-details/clear', 'item_id' => $item->id], ['class' => 'btn btn-danger', 'style' => 'width: 100px;']) ?></td>
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
    <?= Html::button('Tiếp tục mua hàng', ['class' => 'btn btn-primary', 'onclick' => 'window.location.href="' . Url::to(['/site/index']) . '"']) ?>
</div>

<script>
    function updatecart(itemId, newQuantity) {
        $.ajax({
           
            url: '<?= Url::to(['/order-details/updatecart', 'quantity' => '']) ?>' + newQuantity,
            type: 'POST',
            data: {item_id: itemId, quantity: newQuantity},
            success: function(data) {
                // Cập nhật lại giao diện nếu cần
                // ...

                // Hiển thị thông báo thành công hoặc lỗi
                // ...
            },
            error: function() {
                // Xử lý lỗi nếu cần
                // ...
            }
        });
    }
</script>
