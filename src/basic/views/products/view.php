<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Products $model */

$this->title = $model->product_id;
//$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">
    <h2 style="text-align: center;"> Xem Thông tin Sản phẩm </h2><br>
    
    <p>
        <?= Html::a('Cập nhật', ['update', 'product_id' => $model->product_id], ['class' => 'btn btn-primary','style' => 'width: 100px;']) ?>
        <?= Html::a('Xóa', ['delete', 'product_id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
            'style' => 'width: 100px;'
        ]) 
        ?>
          <?= Html::a('Quay lại', ['/products'], ['class' => 'btn btn-success','style' => 'width: 100px;']) ?>
    </p>
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        [
            'label' => 'Mã sản phẩm',
            'attribute' => 'product_id',
        ],
        [
            'label' => 'Mã code sản phẩm',
            'attribute' => 'product_code',
        ],
        [
            'label' => 'Tên sản phẩm',
            'attribute' => 'product_name',
        ],
        [
            'label' => 'Giá sản phẩm',
            'attribute' => 'product_price',
        ],
        [
            'label' => 'Hình ảnh',
            'format' => 'html',
            'attribute' => 'product_image',
            'value' => function ($model) {
                return Html::img($model->product_image, ['width' => '100px']);
            },
        ],
        [
            'label' => 'Mô tả',
            'attribute' => 'describe',
            'format' => 'html', // Đặt định dạng là HTML
            'value' => function ($model) {
                // Sử dụng HtmlPurifier để hiển thị nội dung mô tả an toàn
                return yii\helpers\HtmlPurifier::process($model->describe);
            },
        ],
        
        
        [
            'label' => 'Số lượng sản phẩm',
            'attribute' => 'product_quantity',
        ],
       // [
        //  'label' => 'Mã danh mục',
        //  'attribute' => 'cate_id',
      // ],
     
      [
        'label' => 'Danh mục sản phẩm',
        'value' => $model->getCategoryName(), // Sử dụng hàm để lấy tên danh mục từ cate_id
    ],
    [
        'label' => 'Nhà cung cấp',
        'value' => $model->getSupName(), // Sử dụng hàm để lấy tên danh mục từ cate_id
    ],
    
     
    
        [
            'label' => 'Trạng thái',
            'attribute' => 'status',
            'value' => function ($model) {
                return $model->status == 1 ? 'Còn hàng' : 'Hết hàng';
            },
        ],
       // [
        //    'label' => 'Trạng thái',
        //    'attribute' => 'status',
       // ],
    ],
]) ?>



</div>
