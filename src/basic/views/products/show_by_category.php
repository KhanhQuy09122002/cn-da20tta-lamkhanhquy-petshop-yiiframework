<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */


use yii\bootstrap5\Html;
use yii\widgets\LinkPager;

$this->title = $category->cate_name. ' ';

$this->params['breadcrumbs'][] = $this->title;


?>
 



<div class="products">
    <div class = "row">
        <div class = "col-md-12 pb-3">
        <?= Html::img('@web/images/giaodien.png', ['class' => 'img-fluid', 'height' => '300']) ?>
            
        </div>
    </div>
    <div class="row" >
        <?php foreach ($products as $product): ?>
            <div class="col-md-2">
                <a href="<?= yii\helpers\Url::to(['products/detail', 'id' => $product->product_id]) ?>">
                    <div class="product-item">
                    <img class="product-image" src="<?= yii\helpers\Url::base() . '/' . $product->product_image ?>" alt="<?= Html::encode($product->product_name) ?>"></a>
                        <div class="product-info text-center">
                            <p class = "" style="letter-spacing:0.75px;line-height:1.5"><?= Html::encode($product->product_name) ?></p>
                            <p class = "btn btn-danger"><b></b> <?= Yii::$app->formatter->asDecimal($product->product_price, 0) ?> VND</p>
                        </div>
                    </div>
                
            </div>
        <?php endforeach; ?>
    </div>

    <?= LinkPager::widget([
        'pagination' => $pagination,
        'options' => ['class' => 'pagination justify-content-center'],
        'linkContainerOptions' => ['class' => 'page-item'],
        'linkOptions' => ['class' => 'page-link'],
        'disabledListItemSubTagOptions' => ['class' => 'page-link disabled'],
    ]) ?>
</div>
