<?php


use yii\helpers\Html;
use yii\helpers\Url;

$session = Yii::$app->session;
$session->open();

?>
<style>
@media (max-width: 767px) {
.price {width: 100px;
    line-height: 14px;
    font-size: 10px;
    padding-right: 0px;}
    .quantity {
        padding-left: 0px;
    font-size: 10px;
    }
    .shp__price{
        padding-right: 0px;
    padding-left: 0px;
    font-size: 11px;
    }
    .del {
        font-size: 12px;
    margin-top: 5px;
    }
}
</style>

 <div class="modal-body">
 <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                        <div class="shp__cart__wrap" style="margin-top: 10px;">
                            <?php if ($session['bascket.sum'] != 0): ?>
                            <?php  foreach ($session['bascket'] as $id=>$item): ?>
                            <div class="shp__single__product">
                                <div class="shp__pro__thumb">
                                   <a href="/home/catalog/product/discription/<?= $id ?>">
                                        <img style="" src="<?= $item['image'];?>" alt="product images">
                                        
                                    </a>
                                    <a  class="del" style="cursor: pointer;" data-count="<?= $item['count']; ?>" data-id="<?= $id ?>" title="Remove this item">Удалить</a>
                                </div>
                                <!--div class="shp__pro__details"-->
                                    <p style="" class="col-lg-5 price"><?= $item['name'];?><br>
                                   
                                        <span style="font-weight: 600"><?= $item['price'];?> ₽</span><br>
                                       
                                        <span><?= $item['price_opt'];?> ₽ при покупке от <?= $item['opt_count'];?> штук </span><br>
                                         <!--div class="remove__btn"-->
                                            
                                        <!--/div-->
                                    </p>
                                   
                                    <div class="col-lg-1 quantity" style="display: flex;">
                                             <span style="cursor: pointer; margin-right: 20px;" id="remove" class="remove" data-id="<?= $id ?>">
                                                -
                                             </span>
                                             <?= $item['count']; ?>
                                             <span style="cursor: pointer; margin-left: 20px;" class="plus" data-id="<?= $id ?>">
                                                +
                                             </span>
                                </div>
                                <!--div class="col-lg-1 quantity" style="display: flex;">
                                             
                                             <input type="text" value="<?= $item['count']; ?>"></input>
                                             
                                </div-->
                                <p class="col-lg-2 shp__price"><?= $session['bascket'][$id]['sum_product']; ?> ₽</p>
                                
                            </div>
                            <div class="">
                                <p style="color: #ff4136;" id="message_model"><?= $session['bascket'][$id]['message']; ?></p>
                            </div>
                            <?php endforeach; ?>
                            <ul class="shoping__total">
                                <li class="subtotal">ИТОГО: </li>
                                <li class="total__price"><?= $session['bascket.sum']?> ₽</li>
                            </ul>
                   
                            <ul class="shopping__btn">
                                <li class="shp__checkout"><a href="/order/index">ОФОРМИТЬ ЗАКАЗ</a></li>
                            </ul>
                            <?php endif; ?>
                    </div>
                    </div>
                  
