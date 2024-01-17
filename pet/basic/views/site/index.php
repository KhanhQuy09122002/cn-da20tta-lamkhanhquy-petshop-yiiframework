<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */


use yii\bootstrap5\Html;



$this->title = 'Trang chủ';
//$this->params['breadcrumbs'][] = $this->title;
?>
<table border="1" cellspacing="0"  align="center">
        <tr>
        <?= Html::img('@web/images/giaodien.png', ['class' => 'img-fluid', 'height' => '300']) ?>
        </td>
        </tr>
</table>
<br>



</div>

<div class="search-box">
<form action="<?= yii\helpers\Url::to(['products/search']) ?>" method="get">
    <div class="input-group mb-2">
        <input type="text" class="form-control" placeholder="Tìm kiếm sản phẩm" name="search">
        <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
    </div>
</form>

</div>





<div class="products">
    <div class="row">
        <h3 style="text-align: center;"> CHÓ CẢNH </h3>
        <br>
        <?php 
       $products = \app\models\Products::find()
       ->innerJoin('categories', 'products.cate_id = categories.cate_id') 
       ->where(['categories.cate_name' => 'Chó cảnh'])
       ->limit(6)
       ->all();
    
        foreach ($products as $product): 
        ?>
             <div class="col-md-2">
                <a href="<?= yii\helpers\Url::to(['products/detail', 'id' => $product->product_id]) ?>">
                    <div class="product-item">
                    <img class="product-image" src="<?= yii\helpers\Url::base() . '/' . $product->product_image ?>" alt="<?= Html::encode($product->product_name) ?>">


        </a>
                        <div class="product-info text-center">
                            <p class = "" style="letter-spacing:0.75px;line-height:1.5"><?= Html::encode($product->product_name) ?></p>
                            <p class = "btn btn-danger"><b></b> <?= Yii::$app->formatter->asDecimal($product->product_price, 0) ?> VND</p>
                        </div>
                    </div>
                
            </div>
        <?php endforeach; ?>
        <br>
        <h3 style="text-align: center;"> MÈO CẢNH </h3>
        <?php 
       $products = \app\models\Products::find()
       ->innerJoin('categories', 'products.cate_id = categories.cate_id') 
       ->where(['categories.cate_name' => 'Mèo cảnh'])
       ->limit(6)
       ->all();
    
        foreach ($products as $product): 
        ?>
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
        <br>
        <h3 style="text-align: center;"> PHỤ KIỆN THÚ CƯNG </h3>
        <?php 
       $products = \app\models\Products::find()
       ->innerJoin('categories', 'products.cate_id = categories.cate_id') // Thay cate_id và categories.cate_id bằng tên cột thực tế
       ->where(['categories.cate_name' => 'Phụ kiện'])
       ->limit(6)
       ->all();
    
        foreach ($products as $product): 
        ?>
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





 

    

      

           

        
    




