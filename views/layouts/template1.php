<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use app\components\MenuWidget;
use app\components\BascketWidget;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Modal; //для корзины
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\ActiveForm;
use app\models\SearchForm;

use yii\helpers\Url;

AppAsset::register($this);

$model = new SearchForm();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
    <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="index.html">
                                    Garden.
                                </a>
                            </div>
                        </div>
                        <!-- Start MAinmenu Ares -->
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    <li class="drop"><a href="/home/about">О нас</a>
                                    </li>
                                    <li class="drop"><a href="blog.html">Blog</a>
                                        <ul class="dropdown">
                                            <li><a href="blog.html">blog 3 column</a></li>
                                            <li><a href="blog-2-col-rightsidebar.html">2 col right siderbar</a></li>
                                            <li><a href="blog-details-left-sidebar.html"> blog details</a></li>
                                        </ul>
                                    </li>
                                    <li class="drop"><a href="shop.html">Shop</a>
                                        <ul class="dropdown mega_dropdown">
                                            <!-- Start Single Mega MEnu -->
                                            <li><a class="mega__title" href="shop.html">shop layout</a>
                                                <ul class="mega__item">
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                </ul>
                                            </li>
                                            <!-- End Single Mega MEnu -->
                                            <!-- Start Single Mega MEnu -->
                                            <li><a class="mega__title" href="shop.html">product details layout</a>
                                                <ul class="mega__item">
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                    <li><a href="#">demo page title</a></li>
                                                </ul>
                                            </li>
                                            <!-- End Single Mega MEnu -->
                                            <!-- Start Single Mega MEnu -->
                                            <li>
                                                <ul class="mega__item">
                                                    <li>
                                                        <div class="mega-item-img">
                                                            <a href="shop.html">
                                                                <img src="images/feature-img/3.png" alt="">
                                                            </a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <!-- End Single Mega MEnu -->
                                        </ul>
                                    </li>
                                    
                                    <li><a href="contact.html">contact</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        <li><a href="index.html">Home</a>
                                            <ul>
                                                <li><a href="index.html">Home 1</a></li>
                                                <li><a href="index-2.html">Home 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog.html">blog</a>
                                            <ul>
                                                <li><a href="blog.html">blog 3 column</a></li>
                                                <li><a href="blog-2-col-rightsidebar.html">2 col right siderbar</a></li>
                                                <li><a href="blog-details-left-sidebar.html"> blog details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="contact.html">contact</a></li>
                                    </ul>
                                </nav>
                            </div>                          
                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-md-2 col-sm-4 col-xs-3">  
                            <ul class="menu-extra">
                                <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                                <li><a href="login-register.html"><span class="ti-user"></span></a></li>
                                <li class="cart__menu"><span class="ti-shopping-cart"></span></li>
                                <li class="toggle__menu hidden-xs hidden-sm"><span class="ti-menu"></span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
        <?=  app\components\BascketWidget::widget() ?> 
        <?=  app\components\FilterWidget::widget() ?>
        
</header>

<main role="main" class="flex-shrink-0">
    <div class="row" style="">
                <?=  app\components\MenuWidget::widget() ?>
            <div class="col-lg-8 container main_box" style=" ">
            <?= $content ?>
            </div>
        <!--/div-->
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php
    Modal::begin([
    
        'id' => 'bascket',
        'size'=> 'modal-lg',
        'title'=> '<h2>Корзина</h2>',
        'footer' =>  !empty($_SESSION['bascket.sum']) && $_SESSION['bascket.sum'] != 0     // если 
                     ? '<a href="/order/index" class="btn btn-success">Оформить заказ</a> 
                        <a href="#" class="btn btn-danger clear">Очистить корзину</a>'  //то
                     : '<a href="/home/catalog/product/1" class="btn btn-success">Вернуться в каталог</a>',  //иначе
    ]);
    Modal::end();
?>
<?php
    Modal::begin([
        'id' => 'filter_modal',
        'size'=> 'modal-lg',
        'title'=> '<h2>Фильтры</h2>',
        'footer' => '<p></p>',
    ]);
    Modal::end();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>