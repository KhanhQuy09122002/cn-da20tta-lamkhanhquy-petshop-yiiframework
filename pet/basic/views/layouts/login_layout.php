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
    <?php $this->head() ?>
    <style>
        .site-login {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh; 
    padding-top: 20px;/* Đảm bảo form căn giữa ngay cả khi nội dung không đủ lớn */
}
.card {
    max-width: 50rem; /* Điều chỉnh kích thước khung rộng hơn */
    width: 100%;
}

    </style>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/loho.png', ['class' => 'img-responsive']) . 'PetStation',
        //Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
         'options' => ['class' => 'navbar-expand-md navbar-dark bg-primary static-top']
    ]);
   
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
<div class="container-fuild">
  
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
        <?php endif ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
       
</main>

<footer id="footer" class="mt-auto py-3 bg-primary">
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
