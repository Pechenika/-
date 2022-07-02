<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\assets\JsAsset;
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
use app\models\Category;
use app\models\Subcategories;

use yii\helpers\Url;

AppAsset::register($this);
JsAsset::register($this);
//$model = new SearchForm();
$session = Yii::$app->session;
$session->open();


$data = Category::find()->all();
$data2 = Subcategories::find()->all();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <div class="wrapper fixed__footer">
        <!-- Start Header Style -->
        <header id="header" class="htc-header header--3 bg__white">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__area sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 col-sm-3 col-xs-3">
                            <div class="logo">
                                <a href="/home/index">
                                    <h2>Garden.</h2>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6">
                            <nav class="mainmenu__nav hidden-xs hidden-sm">
                                <ul class="main__menu">
                                    
                                    
                                    <li class="drop"><a href="/home/catalogs">Каталог</a>
                                        
                                        <ul class="dropdown mega_dropdown">
                                        <?php if(!empty($data)): ?>
                                        <?php foreach($data as $category): ?>
                                            <!-- Start Single Mega MEnu -->
                                            <li><a class="mega__title" href="/home/catalog/<?= $category['id']?>"><?= $category['name']?></a>
                                                
                                                <ul class="">
                                                <?php foreach($data2 as $subcategory): ?>
                                                <?php if(!empty($subcategory['id_parent']==$category['id'])): ?>
                                                    <li><a href="/home/catalog/product/<?= $subcategory['id']?>"><?= $subcategory['name']?></a></li>
                                                
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                </ul>
                                            </li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        </ul>
                                        
                                    </li>
                                    <!--li class="drop"><a href="#">pages</a>
                                        <ul class="dropdown">
                                            <li><a href="about.html">about</a></li>
                                            <li><a href="shop.html">shop</a></li>
                                            <li><a href="shop-sidebar.html">shop sidebar</a></li>
                                            <li><a href="product-details-sticky-right.html">product details</a></li>
                                            <li><a href="cart.html">cart</a></li>
                                            <li><a href="wishlist.html">wishlist</a></li>
                                            <li><a href="checkout.html">checkout</a></li>
                                            <li><a href="team.html">team</a></li>
                                            <li><a href="login-register.html">login & register</a></li>
                                        </ul>
                                    </li-->
                                    <li class="drop"><a href="/home/about">О нас</a>
                                    </li>
                                    <li><a href="/home/contact">Контакты</a></li>
                                    <?php if(!Yii::$app->user->isGuest): ?> <li class="drop"><a href="/admin/admin/index">Панель администратора</a></li><? endif; ?>
                                </ul>
                            </nav>
                            <div class="mobile-menu clearfix visible-xs visible-sm">
                                <nav id="mobile_dropdown">
                                    <ul>
                                        
                                        <li class="drop"><a href="/home/catalogs">Каталог</a>
                                            <ul class="dropdown mega_dropdown">
                                                <?php if(!empty($data)): ?>
                                                <?php foreach($data as $category): ?>
                                                    <!-- Start Single Mega MEnu -->
                                                    <li><a class="mega__title" href="/home/catalog/<?= $category['id']?>"><?= $category['name']?></a>
                                                
                                                        <ul class="">
                                                        <?php foreach($data2 as $subcategory): ?>
                                                        <?php if(!empty($subcategory['id_parent']==$category['id'])): ?>
                                                            <li><a href="/home/catalog/product/<?= $subcategory['id']?>"><?= $subcategory['name']?></a></li>
                                                
                                                        <?php endif; ?>
                                                        <?php endforeach; ?>
                                                        </ul>
                                                    </li>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="/home/about">О нас</a></li>
                                        <li><a href="/home/contact">Контакты</a></li>
                                        <?php if(!Yii::$app->user->isGuest): ?> <li class="drop"><a href="/admin/admin/index">Панель администратора</a></li><? endif; ?>
                                    </ul>
                                </nav>
                            </div>                          
                        </div>
                        <!-- End MAinmenu Ares -->
                        <div class="col-md-2 col-sm-4 col-xs-3">  
                            <ul class="menu-extra">
                                <li class="search search__open hidden-xs"><span class="ti-search"></span></li>
                                <?php if(Yii::$app->user->isGuest): ?> <li><a href="/site/login"><span class="ti-user"></span></a></li> <? endif; ?>
                                <?php if(!Yii::$app->user->isGuest): ?> <li><a href="/site/logout">Выйти</a></li> <? endif; ?>
                                <!--li class="show"><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-shopping-cart"  data-target="#productModal" ></span></a><span id="countBascket"  class="countBascket"><?= $session['bascket.count']; ?></span></li-->
                                <?=  app\components\BascketWidget::widget() ?> 
                                <!--li class="toggle__menu hidden-xs hidden-sm"><span class="ti-menu"></span></li-->
                            </ul>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Style -->
        
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="/home/search" method="get">
                                    <input placeholder="Поиск " name="param" type="text">
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         <?= $content ?>
        <footer class="htc__foooter__area gray-bg">
            <div class="container">
                <div class="row">
                    <div class="footer__container clearfix">
                         <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-lg-2 col-sm-6">
                            <div class="ft__widget">
                                <div class="ft__logo">
                                    <h2 href="/home/index">
                                        Garden.
                                    </h2>
                                </div>
                                <div class="address-icon">
                                               <i class="zmdi zmdi-email"></i>
                                        </div>
                                        <div class="address-text">
                                            <a href="#"> info@mail.com</a>
                                        </div>
                                    
                                        
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-phone-in-talk"></i>
                                            </div>
                                            <div class="address-text">
                                                <p>8(905)219-55-22 </p>
                                            </div>
                                        
                            </div>
                        </div>
                        <div class="col-md-2 col-lg-2 col-sm-6">
                            <div class="ft__widget"> 
                                    <div class="footer-address">
                                    <h2 class="ft__title">Навигация</h2>
                                    <ul class="">
                                        <li><a href="/home/index">Главная</a></li>
                                        <li><a href="/home/catalogs">Каталог</a></li>
                                        <li><a href="/home/contact">Контакты</a></li>
                                        <li><a href="/home/about">О нас</a></li>
                                    </ul>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-6">
                            <div class="ft__widget">
                                    <ul>
                                        <li>
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-pin"></i>
                                            </div>
                                            <div class="address-text">
                                                <p>Привокзальная пл., д. 3 <br> Метро «Девяткино»</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-pin"></i>
                                            </div>
                                            <div class="address-text">
                                                <p>г. Санкт-Петербург, Правобережный рынок, <br> ул. Дыбенко 16</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="address-icon">
                                                <i class="zmdi zmdi-pin"></i>
                                            </div>
                                            <div class="address-text">
                                                <p>Ленинградская область, Всеволожский район ,поселок. Романовка, шоссе Дорога Жизни, д. 63.</p>
                                            </div>
                                        </li>
                                        <li>
                                    </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-2 col-sm-6 smt-30 xmt-30">
                            <div class="ft__widget">
                                <h2 class="ft__title">Категории</h2>
                                    <ul class="footer-categories" style="text-decoration: none;">
                                    <?php if(!empty($data)): ?>
                                    <?php foreach($data as $category): ?>
                                        <li ><a href="/home/catalog/<?= $category['id']?>"><?= $category['name']?></a>
                                        </li>  
                                    
                                <?php endforeach; ?>
                                <?php endif; ?></ul>
                            </div>
                        </div>
                        
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        
                        
                    </div>
                </div>
                <!-- Start Copyright Area -->
                <div class="htc__copyright__area">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                            <div class="copyright__inner">
                                <div class="copyright">
                                    <p>© 2022 <a href="#">Garden.</a>
                                    </p>
                                </div>
                                <ul class="footer__menu">
                                    <li><a href="/home/index">Политика</a></li>
                                    <!--li><a href="/home/catalog">Каталог</a></li>
                                    <li><a href="/home/contact">Контакты</a></li>
                                    <li><a href="/home/about">О нас</a></li-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Copyright Area -->
            </div>
        </footer>
        <!-- End Footer Area -->
    </div>
    <!-- Body main wrapper end -->
    <!-- QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        
        <div class="fade modal"  id="bascket" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <!--div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div-->
                  
                    <div class="modal-footer">
                    </div>

                </div>
            </div>
        </div>
        <!-- END Modal -->
    </div>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>