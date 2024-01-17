<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

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
    <style>
        /* CSS cho phân trang */
.pagination {
    display: flex;
    justify-content: center;
    list-style: none;
    padding: 0;
}

.pagination li {
    margin: 0 5px;
}

.pagination a {
    color: #333;
    text-decoration: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.pagination a:hover {
    background-color: #eee;
}

.pagination .active a {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}


.table-style {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px; /* Khoảng cách từ trên cùng của bảng */
}

.table-style th, .table-style td {
    border: 1px solid #ccc;
    padding: 8px;
}

#main {
    /* hoặc margin-top: 0; */
    padding-bottom: 45px;
}
#main {
    /* hoặc margin-top: 0; */
    padding-top: 50px;
    padding-bottom: 60px;
}
/* Style cho các phần tử */
.order {
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 20px;
}

.order-header {
    margin-bottom: 15px;
}

.order-id {
    font-size: 1.2em;
    margin: 5px 0;
}

.order-total {
    font-weight: bold;
}

.user-info p {
    margin: 5px 0;
}

.order-details .detail-item {
    border-top: 1px solid #eee;
    padding-top: 10px;
    margin-top: 10px;
}
/* Style cho các phần tử */
.invoice {
    background-color: #fff;
    border: 1px solid #e5e5e5;
    padding: 20px;
    margin-bottom: 30px;
    font-family: Arial, sans-serif;
}

.invoice-header {
    text-align: center;
    margin-bottom: 20px;
}

.invoice-title {
    margin: 0;
    color: #333;
}

.invoice-date {
    color: #888;
}

.customer-info {
    margin-bottom: 30px;
}

.order-details {
    margin-bottom: 30px;
}

table.table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid #ddd;
}

table.table th, table.table td {
    border: 1px solid #ddd;
    padding: 8px;
}

.invoice-total {
    text-align: right;
    font-weight: bold;
}
.col-sm-9 {
    overflow: auto; /* Sử dụng auto để hiển thị thanh cuộn khi cần thiết */
    max-height: 100vh; /* Đặt chiều cao tối đa, có thể thay đổi theo yêu cầu */
}



    </style>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<header id="header">
    <nav class="navbar navbar-expand-md navbar-dark bg-primary static-top fixed-top">
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
            
                if (Yii::$app->user->isGuest) {
                    $menuItems[] = ['label' => 'Đăng nhập', 'url' => ['/site/login']];
                } else {
                  
                    $menuItems[] = [
                        'label' => 'Xin chào  ' . Yii::$app->user->identity->username . ' | Hồ sơ',
                        'items' => [
                           
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



<br>
<main id="main" class="flex-shrink-0" role="main">

    <div class="container-fluid">
  
        <i class='fas fa-user-tie' style='font-size:48px;color:red'></i>
    <div class="row">
    <div class="col-sm-3 sidenav" style="display: flex; justify-content: center">
      <div class="panel panel-primary">
        <div class="panel-body">
            <ul class="list-group"  >
           
                
            <li class="list-group-item">
            <?= Html::img('@web/images/user.png', ['class' => 'img-responsive']) ?>

                <?= Html::a('Quản lý Người dùng', ['/users'], ['style' => 'text-decoration: none;']) ?>
            </li>
            </ul><br>
            <ul class="list-group" >
           
                
                <li class="list-group-item" >
                <?= Html::img('@web/images/sanpham.png', ['class' => 'img-responsive']) ?>

                <?= Html::a('Quản lý Sản phẩm', ['/products'], ['style' => 'text-decoration: none;']) ?>
                  
                </li>
            </ul><br>
            <ul class="list-group" >
           
                
           <li class="list-group-item" >
           <?= Html::img('@web/images/danhmuc.png', ['class' => 'img-responsive']) ?>

           <?= Html::a('Quản lý Danh mục', ['/categories'], ['style' => 'text-decoration: none;']) ?>
             
           </li>
       </ul><br>
       <ul class="list-group" >
           
                
           <li class="list-group-item" >
            
           <?= Html::img('@web/images/donhang.png', ['class' => 'img-responsive']) ?>

           <?= Html::a('Quản lý Đơn hàng', ['/orders'], ['style' => 'text-decoration: none;']) ?>
             
           </li>
       </ul><br>
       <ul class="list-group" >
           
                
           <li class="list-group-item" >
            
           <?= Html::img('@web/images/donhang.png', ['class' => 'img-responsive']) ?>
           <?= Html::a('Quản lý Chi tiêt đơn hàng', ['/orders/output'], ['style' => 'text-decoration: none;']) ?>
             
           </li>
       </ul><br>
       <ul class="list-group" >
           
                
           <li class="list-group-item" >
           <?= Html::img('@web/images/ncc.jpg', ['class' => 'img-responsive']) ?>
           <?= Html::a('Quản lý Nhà cung cấp', ['/supplier'], ['style' => 'text-decoration: none;']) ?>
             
           </li>
       </ul>
       <br>
       <ul class="list-group" >
           
                
           <li class="list-group-item" >
           <?= Html::img('@web/images/thongke.png', ['class' => 'img-responsive']) ?>
           <?= Html::a('Thống kê', ['/order-details/revenue'], ['style' => 'text-decoration: none;']) ?>
             
           </li>
       </ul>
        </div>
        </div>

    </div>
    <div class="col-sm-9 ">

<?php if (!empty($this->params['breadcrumbs'])): ?>
    <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
<?php endif ?>
<?= Alert::widget() ?>
<?= $content ?>
</div>
   
        </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-primary fixed-bottom">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; PetStation <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end">Power by: Lâm Khánh Quy</div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
