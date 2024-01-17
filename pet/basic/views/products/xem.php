<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */


use yii\bootstrap5\Html;


$this->title = 'Danh sách sản phẩm tìm kiếm theo "' . Html::encode(Yii::$app->request->get('search')) . '"';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "col-md-12 pb-3">
        <?= Html::img('@web/images/giaodien.png', ['class' => 'img-fluid', 'height' => '300']) ?>
            
</div>
<h3 ><?= Html::encode($this->title) ?></h3>


<?php if (!empty($products)) : ?>
    <div class="row">
    <?php foreach ($products as $product): ?>
    <div class="col-md-2">
        <a href="<?= yii\helpers\Url::to(['products/detail', 'id' => $product->product_id]) ?>">
            <div class="product-item">
                <img class="product-image" src="<?= yii\helpers\Url::base() . '/' . $product->product_image ?>" alt="<?= Html::encode($product->product_name) ?>">
            </a>
            <div class="product-info text-center">
                <p style="letter-spacing: 0.75px; line-height: 1.5"><?= Html::encode($product->product_name) ?></p>
                <p class="btn btn-danger"><b></b> <?= Yii::$app->formatter->asDecimal($product->product_price, 0) ?> VND</p>
            </div>
        </div>
    </div>
<?php endforeach; ?>

    </div>
<?php else : ?>
    <p>Không tìm thấy sản phẩm nào.</p>
<?php endif; ?>
