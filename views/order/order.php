<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Payment;
use app\modules\admin\models\Product;
use app\modules\admin\models\Shop;
use app\modules\admin\models\Delivery;
use app\models\Order;
use yii\helpers\ArrayHelper;
?>
<!--script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
<script src="https://yandex.st/jquery/2.2.3/jquery.min.js" type="text/javascript"></script-->
<style>
.form-group {
    width: 47.5%;
}
#map {
            width: 1000px; height: 200px; padding: 0; margin: 0;
        }
.field-order-surname_user  {
   margin-left: 4.5%;
}
.field-order-id_delivery {
margin-left: 4.5%;
}
.field-order-note {
    margin-left: 4.5%;
}
#order-id_payment {
    padding-top: 0%
}
#order-id_shop {
     width: 100%;
     padding-top: 0%
}
.field-order-note{
     width: 100%;
}
.field-order-id_shop {
    width: 100%;
}
textarea.form-control{
    margin-left: 4.5%;
}

}
</style>

<div class="ht__bradcaump__area" style="background: #fff ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner text-center">
                                
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="/home/index">Главная</a>
                                  <span class="brd-separetor">/</span>
                                  <a class="breadcrumb-item" href="/home/catalogs">Каталог</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Оформление заказа</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Checkout Area -->
        
        <section class="our-checkout-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-lg-8">
                    <div class="cart-main-area ptb--120 bg__white" style="padding: 20px 0px;">
                     <h2 class="section-title-3">Оформление заказа</h2>
            <br><br><div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                           
                                <table>
                                    <thead>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($session['bascket'] as $id=>$item): ?>
                                            <?php if($id>=1): ?>   
                                        <tr style="border: 1px solid #ddd;">
                                            <td class="product-thumbnail" style="border: 1px solid #ddd;"><a href="#"><img src="<?= $item['image'];?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?= $item['name']; ?></a></td>
                                            <td class="product-price"><span class="amount"><?= $item['price']?> ₽</span></td>
                                            <td class="product-quantity"><?= $item['count']?></td>
                                            <td class="product-subtotal"><?= $item['price'] * $item['count']; ?> ₽</td> 
                                        </tr>
                                        <?php endif; ?>
                                        
                                            
                                       
                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                  
                            </div>
                           
                        </form> 
                    </div>
                </div>
            </div>
        </div>
                    <?php $form = ActiveForm::begin(['id' => 'order-form']); ?>
                    <div class="checkout-form">
                        <div class="ckeckout-left-sidebar">
                            <!-- Start Checkbox Area -->
                               
                                
                                <div class="checkout-form-inner">
                                    <div class="single-checkout-box" style="">
                                        <!--input type="text" placeholder="First Name*"-->
                                        <?= $form->field($model, 'name_user')->textInput(['placeholder'=>'Имя*'])->label(false); ?>
                                        <?= $form->field($model, 'surname_user')->textInput(['placeholder'=>'Фамилия*'], ['style'=> 'margin-left: 4.5%;'])->label(false); ?>
                                      
                                    </div>
                                    
                                    <div class="single-checkout-box">    
                                    <?= $form->field($model, 'phone')->textInput(['placeholder'=>'+7(999) 999-99-99*'])->label(false); ?>
                                    <?= $form->field($model, 'note')->textInput(['placeholder'=>'Комментарий*'])->label(false); ?>
                                    </div>
<?= $form->field($model, 'order_email')->textInput(['placeholder'=>'mail@mail.ru'])->label(false); ?>
                                    <div class="single-checkout-box select-option mt--40">
                                    <?= $form->field($model, 'id_payment')->dropDownList(ArrayHelper::map(Payment::find()->all(), 'id', 'type'))->label('Способ оплаты'); ?> 
                                    <?= $form->field($model, 'id_delivery')->radioList(ArrayHelper::map(Delivery::find()->all(), 'id', 'type'))->label('Способ доставки');  ?>
                                    </div>
                                    <div class="single-checkout-box select-option mt--40">
                                    <?= $form->field($model, 'id_shop')->dropDownList(ArrayHelper::map(Shop::find()->all(), 'id', 'adress'),['style'=>'display: none; '])->label(false); ?>
                                    </div><div class="single-checkout-box select-option mt--40">
                                   <?= $form->field($model, 'adress')->textInput(['style'=>'display: none;'], ['placeholder'=>'Адрес*'])->label(false); ?>
                                   <!--?= $form->field($model, 'ymaps-2-1-79-searchbox-input__input')->textInput(['style'=>'display: none;'], ['placeholder'=>'Адрес*'])->label(false); ?-->
				                    <div id="map" style="display: none;"></div>
                                    
                                   </div>
                                     
                                </div>
                            </div>
                            <p style="font-size: 20px;font-weight: 800;text-align: right;" class="product-price">ИТОГО: <span class="amount"><?= $session['bascket.sum']?> ₽</span></p><br>
            </div>
                            <div class="our-payment-sestem">
                             
                             <input type="checkbox" id="order-agree" required ><span style="margin-left: 15px;">Я согласен на <a href="/home/agreedata"><u>обработку персональных данных</u></a></span></input> 
                                <br><br><div class="checkout-btn">
                                    <!--a class="ts-btn btn-light btn-large hover-theme" href="#">ОФОРМИТЬ ЗАКАЗ</a-->
                                    <?= Html::submitButton(Yii::t('app', 'ОФОРМИТЬ ЗАКАЗ'), ['class' => 'btn btn-success order_btn']) ?>
                                </div>  
                                
                            </div>
                            
                        </div>
                    </div>
                    
                    <?php ActiveForm::end(); ?>
                </div>
               
        </section>
        