<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/** @var yii\web\View $this */
/** @var app\models\Products $model */
/** @var yii\widgets\ActiveForm $form */

?>


<div class="products-form">
  
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>  

<?= $form->field($model, 'product_id')->textInput()->label('Mã sản phẩm') ?>

<?= $form->field($model, 'product_code')->textInput(['maxlength' => true])->label('Mã code sản phẩm') ?>

<?= $form->field($model, 'product_name')->textInput(['maxlength' => true])->label('Tên sản phẩm') ?>

<?= $form->field($model, 'product_price')->textInput()->label('Giá sản phẩm') ?>


<?= $form->field($model, 'file')->fileInput()->label('Hình ảnh') ?>


<?= $form->field($model, 'describe')->widget(TinyMce::class, [
    'options' => ['rows' => 6], // Tuỳ chỉnh số dòng cho trình soạn thảo
    'clientOptions' => [
        'plugins' => [
            'media',
            'table',
        ],
        'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | media',
        'forced_root_block' => false, // Tắt tự động thêm thẻ <p>
        'force_br_newlines' => true, 
        'valid_elements' => '*[*]',
     
        // Cấu hình toolbar để bao gồm các chức năng quản lý media, trong đó có upload video (nếu đã cấu hình)
    ]
])->label('Mô tả');
?>


<?= $form->field($model, 'product_quantity')->input('number')->label('Số lượng sản phẩm') ?>


<?= $form->field($model, 'cate_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(\app\models\Categories::find()->all(), 'cate_id', 'cate_name'),
    ['prompt' => 'Chọn danh mục']
)->label('Danh mục sản phẩm') ?>

<?= $form->field($model, 'sup_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(\app\models\Supplier::find()->all(), 'sup_id', 'sup_name'),
    ['prompt' => 'Chọn Nhà cung cấp']
)->label('Nhà cung cấp') ?>

<?= $form->field($model, 'status')->dropDownList(
    [
        1=>'Còn hàng',
        2=>'Hết hàng'
    ],
    [
        'prompt'=>'Chọn trạng thái'
    ],
    ['maxlength' => true])->label('Trạng thái') ?>


    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success','style' => 'width: 70px;']) ?>
        <?= Html::a('Trở lại', ['/products'], ['class' => 'btn btn-success','style' => 'width: 70px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
