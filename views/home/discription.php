<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
$this->title = $data[0]->name;
$this->params['breadcrumbs'][] = ['label' => $cat1[0]->name, 'url'=> ['/home/catalog/'.$cat1[0]->id]];
$this->params['breadcrumbs'][] = ['label' => $subcat1[0]->name, 'url'=> ['/home/catalog/product/'.$subcat1[0]->id]];
$this->params['breadcrumbs'][] = $data[0]->name;
 
?>
<!--head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <!--link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

</head-->
<style>
.oprmuw7_plp {
    font-weight: 500;
    font-size: 1rem;
    font-family: inherit;
    text-decoration: none;
    color: inherit;
    cursor: pointer;
    /*-webkit-appearance: none!important;*/
    appearance: none!important;
    /*-webkit-user-select: none;*/
    user-select: none;
    -webkit-tap-highlight-color: #f0f1f2;
    --text-color: var(--color-text);
    font-weight: 400;
    color: var(--text-color);
    font-size: 14px;
    line-height: 18px;
    z-index: 2;
    justify-content: flex-start;
    width: 100%;
    padding: 11px 29px 11px 12px;
    margin: 0;
    background-color: #f0f1f2;
    border: none;
    border-radius: 4px;
    transition: background-color .15s ease-in-out;
	}
	.tdright {
		padding-left: 100%;
	}
    .product{ height: 461px; text-align: center;}
    @media (max-width: 767px) {
        .product{ height: auto; }
    }
    .product__hover__info {
        width: 20%;
    }
    .owl-stage .owl-item { width : 292px ; }
</style>

        <!-- Start Bradcaump area -->
        
        <div class="ht__bradcaump__area" style="background: #fff ;">
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
        <!-- Start Product Details -->
        <?php foreach($data as $product): ?>
        <section class="htc__product__details pt--100 pb--100 bg__white">
            <div class="container">
                <div class="scroll-active">
                    <div class="row">
                        <div class="col-md-7 col-lg-7 col-sm-5 col-xs-12">
                            <div class="product__details__container product-details-5">
                                <div class="scroll-single-product mb--30">
                                   <img style="border: 1px solid #ccc;" src="<?= $product['image'] ?>" alt="full-image">
                                </div>
                               <?php foreach($image as $img): ?>
                                <div class="scroll-single-product mb--30">
                                    <img style="border: 1px solid #ccc;" src="<?= $img['file'] ?>" alt="full-image">
                                </div>
                               
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="sidebar-active col-md-5 col-lg-5 col-sm-7 col-xs-12 xmt-30">
                            <div class="htc__product__details__inner ">
                                <div class="pro__detl__title">
                                    <h2><?= $product['name'] ?></h2>
                                </div>
                                
                                <div class="pro__details">
                                    <!--p><?= $product['description'] ?></p-->
                                </div>
                                <ul class="pro__dtl__prize">
                                <?php if($product['old_price'] != 0): ?>
                                    <li class="old__prize"><?= $product['old_price'] ?> ₽</li>
                                    <li style="color: #ff4136; font-weight: 600;"><?= $product['price'] ?> ₽</li>
                                <?php endif; ?> <?php if($product['old_price'] == 0): ?>
                                    <li style="color: #444444; font-weight: 600;" ><?= $product['price'] ?> ₽</li><br>
                                <?php endif; ?>
                                </ul>
                                 <p style="color: #444444; font-size: 20px ;margin-bottom: 40px;">Стоимость товара <?= $product['price_opt'] ?> ₽ при покупке от <?= $product['opt_count'] ?> штук</p>
                                
                                <ul class="pro__dtl__btn">
                                    <li class="buy__now__btn"><a  data-id="<?= $product['id']?>" data-count="1" title="Добавить в корзину" style="cursor: pointer;" class="add" id="add">в корзину</a></li>
                                    
                                </ul>
                                <div class="pro__dtl__color">
                                
                                
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Details -->
        <!-- Start Product tab -->
        <section class="htc__product__details__tab bg__white pb--120">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <ul class="product__deatils__tab mb--60" role="tablist"  style="padding-left: 30px;">
                            <?php if($product['description']): ?><li role="presentation" class="active">
                                <a href="#description" role="tab" data-toggle="tab">Описание</a>
                            </li>
                            <?php endif; ?>
                            <?php if($property): ?><li role="presentation">
                                <a href="#sheet" role="tab" data-toggle="tab">Характеристики</a>
                            </li>
                            <?php endif; ?>
                            <li role="presentation">
                                <a href="#reviews" role="tab" data-toggle="tab">Похожие товары</a>
                            </li><li role="presentation">
                                <a href="#related" role="tab" data-toggle="tab">Сопутствующие товары</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="product__details__tab__content" style="padding-left: 30px;">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="product__tab__content fade in active">
                                <div class="product__description__wrap">
                                    <div class="product__desc">
                                        <!--h2 class="title__6">Характеристики</h2-->
                                        <ul class="feature__list">
                                            <p><?= $product['description'] ?></p>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="sheet" class="product__tab__content fade">
                                <div class="pro__feature">
                                        <!--h2 class="title__6">Описание</h2-->
                                        
                                        <table class ="characteris" style="">
				                    <?php foreach($property as $prop): // значения свойств ?> 
					                    <?php foreach($cat as $c): //категории ?>
						                    <?php if($prop['id_subcat_property'] == $c['id']): //если чабкат ид == ид категории ?>
							                    <?php foreach($name as $n): ?>
								                    <?php foreach($values as $val): //категории ?>
								                    <?php if($c['id_property'] == $n['id']): ?>
								                    <?php if($val['id'] == $prop['id_value']): ?>
								                      <tr width="100%">
									                    <td class="tdleft" style="text-align: left; valign: top;"><?= $n->name; ?></td>
									                    <td class="tdright" style="text-align: right; valign: top;"><?= $val->name ?></td>
								                      </tr>
								                     <?php endif; ?>
								                     <?php endif; ?>
							                     <?php endforeach; ?>
							                     <?php endforeach; ?>
						                     <?php endif; ?>
					                     <?php endforeach; ?>
				                     <?php endforeach; ?>
			                    </table>
                                    </div>
                            </div>
                            <!-- End Single Content -->
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="reviews" class="product__tab__content fade">
                                <div class="review__address__inner">
                                    <!-- Start Single Review -->
                                   <div class="row">
                                                <div class="product-slider-active owl-carousel" >
                                                    <?php foreach($data3 as $item): ?>
                                                        <div class="col-md-2 single__pro col-lg-2 cat--1 col-sm-4 col-xs-12">
                                                                <div class="product" >
                                                                    <div class="product__inner">
                                                                        <div class="pro__thumb">
                                                                            <a href="/home/catalog/product/discription/<?= $item['id']?>">
                                                                                <img src="<?= $item['image']?>" alt="product images">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product__hover__info">
                                                                            <ul class="product__action">
                                                                                <!--li><a data-toggle="modal" data-id="<?= $item['id']?>" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li-->
                                                                                <li><a  data-id="<?= $item['id']?>" data-count="1" title="Add TO Cart"  class="add" id="add"><span class="ti-shopping-cart"></span></a></li>
                                                                               
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product__details">
                                                                        <h2><a href="/home/catalog/product/discription/<?= $item['id']?>"><?= $item['name']?></a></h2>
                                                                        <ul class="product__price" style="justify-content: center;">
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
                                                    <?php endforeach; ?>
                                                </div>    
                                    </div>
                                </div>                      
                               
                            </div>
                            <div role="tabpanel" id="related" class="product__tab__content fade">
                                <div class="review__address__inner">
                                    <!-- Start Single Review -->
                                   <div class="row">
                                                <div class="product-slider-active owl-carousel" >
                                                    <?php foreach($rel_product as $item): ?>
                                                        <div class="col-md-2 single__pro col-lg-2 cat--1 col-sm-4 col-xs-12">
                                                                <div class="product" >
                                                                    <div class="product__inner">
                                                                        <div class="pro__thumb">
                                                                            <a href="/home/catalog/product/discription/<?= $item['id']?>">
                                                                                <img src="<?= $item['image']?>" alt="product images">
                                                                            </a>
                                                                        </div>
                                                                        <div class="product__hover__info">
                                                                            <ul class="product__action">
                                                                                <!--li><a data-toggle="modal" data-id="<?= $item['id']?>" data-target="#productModal" title="Quick View" class="quick-view modal-view detail-link" href="#"><span class="ti-plus"></span></a></li-->
                                                                                <li><a  data-id="<?= $item['id']?>" data-count="1" title="Add TO Cart"  class="add" id="add"><span class="ti-shopping-cart"></span></a></li>
                                                                               
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product__details">
                                                                        <h2><a href="/home/catalog/product/discription/<?= $item['id']?>"><?= $item['name']?></a></h2>
                                                                        <ul class="product__price" style="justify-content: center;">
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
                                                    <?php endforeach; ?>
                                                </div>    
                                    </div>
                                </div>                      
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php endforeach; ?>
    <div id="quickview-wrapper">
        
    </div>
  

