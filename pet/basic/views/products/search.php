<?php
use yii\helpers\Html;

$this->title = 'Kết quả tìm kiếm cho: ' . $searchKeyword;
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<div class="row">
    <?php foreach ($products as $product): ?>
        <div class="col-md-4">
            <div class="product-item">
                <h2><?= Html::encode($product->product_name) ?></h2>
                <!-- Hiển thị thông tin sản phẩm khác nếu cần -->
            </div>
        </div>
    <?php endforeach; ?>
</div>

