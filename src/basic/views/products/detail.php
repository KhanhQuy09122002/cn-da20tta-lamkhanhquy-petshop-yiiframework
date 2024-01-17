
<?php

/** @var yii\web\View $this */
/** @var app\models\Product $product */

use yii\bootstrap5\Html;

//$this->title = $product->product_name;
//$this->title = 'Chi tiết sản phẩm';
//$this->params['breadcrumbs'][] = $this->title;
$this->title = 'Chi tiết sản phẩm: ' . $product->product_name;
if ($product->category !== null) {
    $this->title .= ' - ' . $product->category->cate_name;
}

if ($product->category !== null) {
    $this->params['breadcrumbs'][] = ['label' => $product->category->cate_name];
}
$this->params['breadcrumbs'][] = ['label' => $product->product_name];



// Xác định trạng thái sản phẩm dựa trên số lượng
$status = $product->product_quantity > 0 ? 'Còn hàng' : 'Hết hàng';
$kt = $product->product_quantity;

?>

<div class="container">
    

    <div class="row">
        <div class="col-md-4">
            <!-- Hiển thị hình ảnh sản phẩm -->
            <img class="product-image" src="<?= yii\helpers\Url::base() . '/' . $product->product_image ?>" alt="<?= Html::encode($product->product_name) ?>">
        </div>
        <div class="col-md-8">
            <!-- Hiển thị thông tin sản phẩm -->
           
            <div class="product-info">
        

                <h2><?= Html::encode($product->product_name) ?></h2>
                <p><b>Giá:</b> <?= Yii::$app->formatter->asDecimal($product->product_price, 0) ?> VND</p>
                <p><b>Mã code sản phẩm:</b> <?= Html::encode($product->product_code) ?></p>
                <p><b>Mô tả sản phẩm:</b><br> <?= Html::decode($product->describe) ?></p>
                <p><b>Danh mục:</b> <?= Html::encode($product->category->cate_name) ?></p>
                <p><b>Trạng thái:</b> <?= Html::encode($status) ?></p>

                <?php if ($product->product_quantity > 0) : ?>
                    <?php if (!Yii::$app->user->isGuest) : ?>
                        <?= Html::a('Thêm vào giỏ hàng', ['order-details/add-to-cart', 'product_id' => $product->product_id], [
                            'class' => 'btn btn-primary',
                            'data' => [
                                'method' => 'post',
                            ],
                        ]) ?>
                    <?php else : ?>
                        <?= Html::a('Đăng nhập để mua hàng', ['site/login'], [
                            'class' => 'btn btn-info',
                        ]) ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>



    <div class="container">
    <!-- ... (các phần thông tin sản phẩm) ... -->

    <div class="row mt-4">
    <h3 style="text-align: center;">Các sản phẩm tương tự</h3>
</div>

<div class="products">
    <div class="row">
        <?php
        // Lấy danh sách các sản phẩm cùng danh mục và không phải là sản phẩm hiện tại
        $relatedProducts = \app\models\Products::find()
            ->where(['<>', 'product_id', $product->product_id]) // Loại bỏ sản phẩm hiện tại
            ->andWhere(['cate_id' => $product->cate_id]) // Lọc theo cùng danh mục
            ->limit(6) // Giới hạn chỉ lấy 4 sản phẩm
            ->all();

        foreach ($relatedProducts as $relatedProduct): ?>
            <div class="col-md-2">
                <a href="<?= yii\helpers\Url::to(['products/detail', 'id' => $relatedProduct->product_id]) ?>">
                    <div class="product-item">
                        <a href="<?= yii\helpers\Url::to(['products/detail', 'id' => $relatedProduct->product_id]) ?>">

                            <img class="product-image" src="<?= yii\helpers\Url::base() . '/' . $relatedProduct->product_image ?>" alt="<?= Html::encode($relatedProduct->product_name) ?>">
                        <a>
                        <div class="product-info text-center">
                            <p class = "" style="letter-spacing:0.75px;line-height:1.5"><?= Html::encode($relatedProduct->product_name) ?></p>
                            <p class = "btn btn-danger"><b></b> <?= Yii::$app->formatter->asDecimal($relatedProduct->product_price, 0) ?> VND</p>
                            <!-- Các thông tin khác của sản phẩm -->
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>









