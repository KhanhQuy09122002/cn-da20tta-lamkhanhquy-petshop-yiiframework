<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use app\models\Categories;
               // Lấy danh sách tất cả danh mục
               $categories = Categories::find()->all();
AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
   <style>
    .products {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.product-item {
    border: 1px solid #e0e0e0;
    margin-bottom: 20px;
    padding: 15px;
    background-color: #fff;
   
}

.product-item img {
    width: 100%;
    height: 200px;
    margin-bottom: 10px;
    object-fit: cover;
    position: relative;
    overflow: hidden;
}
.product-image {
    width: 100%;
    height: auto;
    transition: transform 0.3s ease; /* Áp dụng transition cho thuộc tính transform */
}

.product-item:hover .product-image {
    transform: scale(1.1); /* Hiệu ứng phóng to khi di chuột vào */
}

.product-info h2 {
    font-size: 18px;
    margin-bottom: 5px;
}

.product-info p {
    margin-bottom: 5px;
    font-size: 14px;
}

.product-detail {
    border: 1px solid #ccc;
    padding: 15px;
    border-radius: 8px;
    background-color: #f9f9f9;
    margin: 20px 0;
}

.product-detail h1 {
    font-size: 20px;
    margin-bottom: 8px;
}

.product-detail img {
    max-width: 50%;
    height: 400px;
    margin-bottom: 10px;
}

.product-detail p {
    margin-bottom: 8px;
    font-size: 14px;
}


.search-box .input-group {
    width: 300px; /* Độ rộng của ô tìm kiếm */
    margin: auto; /* Canh giữa ô tìm kiếm */
}

/* Tạo viền và bo tròn góc cho ô input */
.search-box input[type="text"] {
    border-radius: 20px; /* Bo tròn góc */
    border: 1px solid #ced4da; /* Viền */
}

/* Định dạng nút tìm kiếm */
.search-box button[type="submit"] {
    border-radius: 20px; /* Bo tròn góc */
    border: 1px solid #007bff; /* Viền */
    background-color: #007bff; /* Màu nền */
    color: white; /* Màu chữ */
}

/* Hover effect cho nút tìm kiếm */
.search-box button[type="submit"]:hover {
    background-color: #0056b3; /* Màu nền hover */
    border-color: #0056b3; /* Viền hover */
}

/* Trong file CSS của bạn */

#main {
    /* hoặc margin-top: 0; */
    padding-top: 45px;
    padding-bottom: 60px;
}

table {
    border-collapse: collapse;
    border: 1px solid #000; /* Viền đen 1px */
}

td, th {
    border: 1px solid #000; /* Viền đen 1px cho các ô */
    padding: 5px; /* Thêm padding để tạo khoảng cách giữa nội dung và viền */
}

    </style>



<?php $this->beginBody() ?>

<header id="header">
    <nav class="navbar navbar-expand-md navbar-dark bg-secondary static-top fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?= Yii::$app->homeUrl ?>">
            <?= Html::img('@web/images/loho.png', ['class' => 'img-responsive', 'alt' => 'PetShop Logo']) ?> PetStation

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
      
                <?php
 
                $menuItems = [];
            // Tạo menu danh mục
            $menuItems[] = ['label' => 'Trang chủ', 'url' => ['/site/index']];
          // Tạo menu danh mục
          foreach ($categories as $category) {
            $menuItems[] = [
                'label' => $category->cate_name, // Thay 'name' bằng thuộc tính tên của danh mục trong model của bạn
                'url' => ['/products/show-by-category', 'cate_id' => $category->cate_id], // Thay '/product/show-by-category' bằng URL của trang hiển thị sản phẩm theo danh mục
            ];
        }
   
                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => 'Đăng nhập', 'url' => ['/site/login']];
                } else {
                    $menuItems[] = ['label' => 'Giỏ hàng', 'url' => ['/site/house']];
                    $menuItems[] = [
                        'label' => 'Xin chào ' . Yii::$app->user->identity->username . ' | Hồ sơ',
                        'items' => [
                            ['label' => 'Cập nhật thông tin ', 'url' => ['/site/updateuser'], 'linkOptions' => ['data-method' => 'post']],
                            ['label' => 'Đơn hàng của tôi ', 'url' => ['/site/updateod'], 'linkOptions' => ['data-method' => 'post']],
                            ['label' => 'Đăng xuất', 'url' => ['/site/logout'], 'linkOptions' => ['data-method' => 'post']],
                        ],
                    ];
                }

                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav ms-auto'],
                    'items' => $menuItems,
                ]);
                ?>
        
            </div>
        </div>
    </nav>
   
</header>

<main id="main" class="flex-shrink-0 mt-3 mb-0" role="main">
    <div class="container-fuild">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<footer id="footer" class="mt-auto py-3 bg-secondary ">
    <div class="container">
        <div class="row text-dark justify-content-end">
            <div class="col-md-3 text-center">
                <p><b> SƠ LƯỢC VỀ PETSTATION </b></p>
                <p>Petstation là shop cung cấp các linh kiện, phụ kiện dành cho thú cưng tại Việt Nam. Petstation hiện tại có 2 cửa hàng chính tại 253 Minh Khai, Quận Hai Bà Trưng, Tp Hà Nội và 1045 Kha Vạn Cân, Phường Linh Trung, Thủ Đức, Tp.Hcm.</p>
            </div>
            <div class="col-md-3 text-center">
                <p><b>THÔNG TIN LIÊN HỆ</b></p>
                <p>Cửa Hàng Miền Nam: 1045 Kha Vạn Cân, Linh Trung, Thủ Đức, Tp.Hcm.</p>
                <p>Cửa Hàng Miền Bắc: Số 253 Minh Khai, Hai Bà Trưng, Tp.Hà Nội.</p>
            </div>
            <div class="col-md-3 text-center">
                <p><b>CHÍNH SÁCH MUA BÁN</b></p>
                <p>Chính sách bảo mật</p>
                <p>Chính sách vận chuyển và thanh toán</p>
                <p>Chính sách trả đổi và bảo hành</p>
            </div>
            <div class="col-md-3 text-center">
                <p><b>PETSTATION TRÊN MẠNG XÃ HỘI</b></p>
                <p>Facebook</p>
                <p>Zalo </p>
                <p> Tiktok </p>
            </div>
        </div>
    </div>
</footer>






<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
