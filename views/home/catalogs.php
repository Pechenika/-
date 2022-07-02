<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
$this->title = 'Каталог';
$this->params['breadcrumbs'][] = ['label' => 'Каталог', 'url'=> ['/home/catalogs']];
?>
<section class="categories-slider-area bg__white">
            <div class="container">
                <div class="row"> 
<div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                        <?=  app\components\MenuWidget::widget() ?>  
                    </div>
<div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">

        <div class="ht__bradcaump__area" style="background:  #fff;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <?= Breadcrumbs::widget([
    'homeLink' => ['label' => 'Главная', 'url' => '/home/index'],
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area --> 
        <!-- Start Our Product Area -->
        <section class="htc__product__area shop__page ptb--130 bg__white">
            <div class="container">
                <div class="htc__product__container">
                    <?php  if(!empty($subcategories_all)): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="filter__menu__container">
                           
                                <div class="product__menu">
                                    <button data-filter="*"  class="is-checked">Все</button>
                                     <?php foreach($subcategories_all as $subcat): ?>
                                    <button data-filter=".cat--<?= $subcat['id']?>"><?= $subcat['name']?></button>
                                     <?php endforeach; ?>
                                </div>
                                <!--div class="filter__box">
                                    <a class="filter__menu" href="#">Фильтры</a>
                                </div-->
                            
                           
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!-- Start Filter Menu -->
                    <!--div class="filter__wrap">
                        <div class="filter__cart">
                            <div class="filter__cart__inner">
                                <div class="filter__menu__close__btn">
                                    <a href="#"><i class="zmdi zmdi-close"></i></a>
                                </div>
                                <div class="filter__content">
                                    <!-- Start Single Content -->
                                    <!--div class="fiter__content__inner">
                                        <div class="single__filter">
                                            <h2>Sort By</h2>
                                            <ul class="filter__list">
                                                <li><a href="#default">Default</a></li>
                                                <li><a href="#accessories">Accessories</a></li>
                                                <li><a href="#bags">Bags</a></li>
                                                <li><a href="#chair">Chair</a></li>
                                                <li><a href="#decoration">Decoration</a></li>
                                                <li><a href="#fashion">Fashion</a></li>
                                            </ul>
                                        </div>
                                        <div class="single__filter">
                                            <h2>Size</h2>
                                            <ul class="filter__list">
                                                <li><a href="#xxl">XXL</a></li>
                                                <li><a href="#xl">XL</a></li>
                                                <li><a href="#x">X</a></li>
                                                <li><a href="#l">L</a></li>
                                                <li><a href="#m">M</a></li>
                                                <li><a href="#s">S</a></li>
                                            </ul>
                                        </div>
                                        <div class="single__filter">
                                            <h2>Tags</h2>
                                            <ul class="filter__list">
                                                <li><a href="#">All</a></li>
                                                <li><a href="#">Accessories</a></li>
                                                <li><a href="#">Bags</a></li>
                                                <li><a href="#">Chair</a></li>
                                                <li><a href="#">Decoration</a></li>
                                                <li><a href="#">Fashion</a></li>
                                            </ul>
                                        </div>
                                        <div class="single__filter">
                                            <h2>Price</h2>
                                            <ul class="filter__list">
                                                <li><a href="#">$0.00 - $50.00</a></li>
                                                <li><a href="#">$50.00 - $100.00</a></li>
                                                <li><a href="#">$100.00 - $150.00</a></li>
                                                <li><a href="#">$150.00 - $200.00</a></li>
                                                <li><a href="#">$300.00 - $500.00</a></li>
                                                <li><a href="#">$500.00 - $700.00</a></li>
                                            </ul>
                                        </div>
                                        <div class="single__filter">
                                            <h2>Color</h2>
                                            <ul class="filter__list sidebar__list">
                                                <li class="black"><a href="#"><i class="zmdi zmdi-circle"></i>Black</a></li>
                                                <li class="blue"><a href="#"><i class="zmdi zmdi-circle"></i>Blue</a></li>
                                                <li class="brown"><a href="#"><i class="zmdi zmdi-circle"></i>Brown</a></li>
                                                <li class="red"><a href="#"><i class="zmdi zmdi-circle"></i>Red</a></li>
                                                <li class="orange"><a href="#"><i class="zmdi zmdi-circle"></i>Orange</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Single Content -->
                                <!--/div>
                            </div>
                        <!--/div>
                    </div-->
                    <!-- End Filter Menu -->
                    <!-- End Product MEnu -->
                   
                    <div class="row">
                        <div class="product__list another-product-style">
                         <?php  if(!empty($subcategories_all)): ?>
                    <?php foreach($subcategories_all as $subcat): ?>
                    <?php if(!empty($data)): ?>
                            <!-- Start Single Product -->
                            <?php foreach($data as $item): ?>
                            <?php  if($item['id_subcategory'] == $subcat['id']): ?>
                            <div class="col-md-3 single__pro col-lg-3 cat--<?= $item['id_subcategory']?> col-sm-4 col-xs-12">
                                <div class="product foo">
                                    <div class="product__inner">
                                        <div class="pro__thumb">
                                            <a href="/home/catalog/product/discription/<?= $item['id']?>">
                                                <img src="<?= $item['image'] ?>" alt="product images">
                                            </a>
                                        </div>
                                        <div class="product__hover__info">
                                            <ul class="product__action">
                                                <!--li><a data-toggle="modal" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li-->
                                                 <li style="cursor: pointer;"><a  data-id="<?= $item['id']?>" data-count="1" title="Добавить в корзину"  class="add" id="add"><span class="ti-shopping-cart"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product__details">
                                        <h2><a href="/home/catalog/product/discription/<?= $item['id']?>"><?= $item['name'] ?></a></h2>
                                        <ul class="product__price">
                                            <?php if($item['old_price'] != 0): ?>
                                                <li class="old__price"><?= $item['old_price'] ?> ₽</li>
                                                <li style="color: #ff4136;"><?= $item['price'] ?> ₽</li>
                                            <?php endif; ?> 
                                            <?php if($item['old_price'] == 0): ?>
                                                <li class="new__price" style="color: #444444;" ><?= $item['price'] ?> ₽</li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                             <?php endif; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                        </div>
                    </div>
                   
                    <!-- Start Load More BTn -->
                    <!--div class="row mt--60">
                        <div class="col-md-12">
                            <div class="htc__loadmore__btn">
                                <a >load more</a>
                            </div>
                        </div>
                    </div-->
                    <!-- End Load More BTn -->
                </div>
            </div>
        </section>
        <!-- End Our Product Area -->
        <!-- Start Footer Area -->
       
    
    <!-- Body main wrapper end -->
    <!-- карточка товара модальное окно -->
    </div>
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal__container" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div> 
                    
                    <div class="modal-body">
                        <div class="modal-product" >
                            <!-- Start product images -->
                            <div class="product-images" >
                                <div class="main-image images">
                                    <img alt="big images" src="/web/images/product/big-img/1.jpg">
                                </div>
                            </div>
                            <!-- end product images -->
                            <div class="product-info">
                                <h1><?= $item['name'] ?></h1>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price"><?= $item['price'] ?></span>
                                        <span class="old-price">$45.00</span>
                                    </div>
                                </div>
                                <div class="quick-desc">
                                    <?= $item['description'] ?>
                                </div>
                                <div class="select__color">
                                    <h2>Select color</h2>
                                    <ul class="color__list">
                                        <li class="red"><a title="Red" href="#">Red</a></li>
                                        <li class="gold"><a title="Gold" href="#">Gold</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                        <li class="orange"><a title="Orange" href="#">Orange</a></li>
                                    </ul>
                                </div>
                                <div class="addtocart-btn">
                                    <a href="#">В корзину</a>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div>
                    
                    <!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    </div></div>        
        </section>