<?php $this->title = 'Товары для сада'; ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
</head>
        <!-- Start Feature Product -->
        <section class="categories-slider-area bg__white">
            <div class="container">
                <div class="row">
                
                    <!-- Start Left Feature -->
                    <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12 float-left-style">
                        <!-- Start Slider Area -->
                        <div class="slider__container slider--one">
                            <div class="slider__activation__wrap owl-carousel owl-theme">
                                <!-- Start Single Slide -->
                                <div class="slide slider__full--screen slider-height-inherit slider-text-right" style="background: rgba(0, 0, 0, 0) url(../web/image/slide2.jpg) no-repeat scroll center center / cover ;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-10 col-lg-8 col-md-offset-2 col-lg-offset-4 col-sm-12 col-xs-12">
                                                <div class="slider__inner" style="color: #81b24c">
                                                   <h1 style="font-size: 30px;font-weight: 500; color: #4d8115;"> <span class="text--theme" style="font-size: 50px;font-weight: 700;">АРОМАТНЫЕ СКИДКИ</span>
                                                    <br> <span class="text" style="font-size: 23px;"><span style="font-size: 50px;font-weight: 700;">-20%</span> на зелень и пряные травы</span>
                                                    </h1>
                                                    <div class="slider__btn">
                                                        <a class="htc__btn" href="/home/catalog/product/8">успей купить</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide -->
                                <!-- Start Single Slide -->
                                <div class="slide slider__full--screen slider-height-inherit  slider-text-left" style="background: rgba(0, 0, 0, 0) url(../web/image/slide1.jpg) no-repeat scroll center center / cover ;">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                                                <div class="slider__inner">
                                                    
                                                    <h1 style="font-size: 30px;font-weight: 500; color: #4d8115;">Вкусняшки для растений  <span class="text--theme" style="font-size: 50px;font-weight: 700;">НИЗКИЕ ЦЕНЫ</span>
                                                   <br> <span class="text" style="font-size: 23px;"><span style="font-size: 50px;font-weight: 700;">-50%</span> на все удобрения</span>
                                                   </h1>
                                                   <div class="slider__btn">
                                                        <a class="htc__btn" href="/home/catalog/4">успей купить</a>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide -->
                            </div>
                        </div>
                        <!-- Start Slider Area -->
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 float-right-style">
                        <?=  app\components\MenuWidget::widget() ?>  
                    </div>
               </div></div>        
        </section>
        <!-- End Feature Product -->
        <div class="only-banner ptb--100 bg__white" style="padding-top: 0px;">
            <div class="container">
                <div class="only-banner-img">
                    <img src="../web/image/Frame 4.png" alt="new product">
                </div>
            </div>
        </div>
        <!-- Start Our Product Area -->
        <?php if(!empty($category)): ?>
        <?php foreach($category as $cat): ?>
        <section class="htc__product__area bg__white" style="padding: 60px 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="product-categories-all">
                            <div class="product-categories-title">
                                <h3><?= $cat['name']?></h3>
                            </div>
                            <?php if(!empty($subcategory)): ?>
                            <div class="product-categories-menu">
                                <ul>
                                <?php foreach($subcategory as $subcat): ?>
                                <?php if(!empty($subcat['id_parent']==$cat['id'])): ?>
                                    <li><a href="/home/catalog/product/<?= $subcat['id']?>"><?= $subcat['name']?></a></li>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="product-style-tab">
                            <div class="product-tab-list">
                                <!-- Nav tabs -->
                                <ul class="tab-style" role="tablist">
                                    <li class="active">
                                        <a href="#<?= $cat['name']?>1" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>новинки </h4>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#<?= $cat['name']?>2" data-toggle="tab">
                                            <div class="tab-menu-text">
                                                <h4>популярные</h4>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <?php if(!empty($subcategory)): ?>
                                
                            <div class="tab-content another-product-style jump">    
                                <div class="tab-pane active" id="<?= $cat['name']?>1">
                                        <div class="row">
                                                <div class="product-slider-active owl-carousel">
                                                <?php foreach($subcategory as $subcat): ?>
                                                <?php if(!empty($subcat['id_parent'] == $cat['id'])): ?>
                                                <?php if(!empty($productNew)): ?>
                                                        <?php foreach($productNew as $item): ?>
                                                        <?php if(!empty($item['id_subcategory']==$subcat['id'])): ?>
                                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                                                <div class="product">
                                                                    <div class="product__inner">
                                                                        <div class="pro__thumb">
                                                                            <a href="/home/catalog/product/discription/<?= $item['id']?>">
                                                                                <img src="<?= $item['image']?>" alt="product images">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product__hover__info">
                                                                            <ul class="product__action">
                                                                                <!--li><a data-toggle="modal" data-id="<?= $item['id']?>" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li-->
                                                                                <li style="cursor: pointer;"><a  data-id="<?= $item['id']?>" data-count="1" title="Добавить в корзину"  class="add" id="add"><span class="ti-shopping-cart"></span></a></li>
                                                                               
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product__details">
                                                                        <h2><a href="/home/catalog/product/discription/<?= $item['id']?>"><?= $item['name']?></a></h2>
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
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                </div>    
                                        </div>
                                </div>
                                 <div class="tab-pane" id="<?= $cat['name']?>2">
                                        <div class="row">
                                                <div class="product-slider-active owl-carousel">
                                                <?php foreach($subcategory as $subcat): ?>
                                                <?php if(!empty($subcat['id_parent'] == $cat['id'])): ?>
                                                <?php if(!empty($productNew)): ?>
                                                        <?php foreach($productPopular as $item): ?>
                                                        <?php if(!empty($item['id_subcategory']==$subcat['id'])): ?>
                                                        <div class="col-md-4 single__pro col-lg-4 cat--1 col-sm-4 col-xs-12">
                                                                <div class="product">
                                                                    <div class="product__inner">
                                                                        <div class="pro__thumb">
                                                                            <a href="/home/catalog/product/discription/<?= $item['id']?>">
                                                                                <img src="<?= $item['image']?>" alt="product images">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product__hover__info">
                                                                            <ul class="product__action">
                                                                                <!--li><a data-toggle="modal" data-id="<?= $item['id']?>" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li-->
                                                                                <li style="cursor: pointer;"><a  data-id="<?= $item['id']?>" data-count="1" title="Добавить в корзину"  class="add" id="add"><span class="ti-shopping-cart"></span></a></li>
                                                                               
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product__details">
                                                                        <h2><a href="/home/catalog/product/discription/<?= $item['id']?>"><?= $item['name']?></a></h2>
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
                                                <?php endif; ?>
                                                <?php endforeach; ?>
                                                </div>    
                                        </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endforeach; ?>
        <?php endif; ?>
        <!-- End Our Product Area -->
        <div class="only-banner ptb--100 bg__white" style="padding-top: 0px;">
            <div class="container">
                <div class="only-banner-img">
                    <img src="../web/image/Frame1.png" alt="new product">
                </div>
            </div>
        </div>


