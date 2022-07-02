
<div class="cart-main-area ptb--120 bg__white" style="background: #fff;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">  
                        <h2>Вы успешно оформили заказ!</h2><br>
<p>На сумму: <span style="font-weight: 400"><?= $model->total_price ?> ₽</span></p><br>
<p>Детали заказа:<br>
 <span>Способ получения заказа: <?= $model->delivery->type; ?></span><br>
 <span>Способ оплаты: <?= $model->payment->type; ?></span><br>
 <span><?php if($model->adress) { echo 'Адрес для доставки:   '.$model->adress.'<br>*Менеджер может связаться с вами для уточнения информации по доставке по указанному вами номеру - '.$model->phone;  } else echo 'Пункт самовывоза:   '.$model->shop->adress; ?></span>
</p>

<br><br>
                            <div class="table-content table-responsive">
                            

                                <table>
                                    <thead>
                                        <!--tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr-->
                                    </thead>
                                    <tbody>
                                   
                                        <?php foreach ($order as $item1): ?> 
                                       
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?= $item1->product->image; ?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?= $item1->product->name; ?></a></td>
                                            <td class="product-price"><span class="amount"><?= $item1->product->price?> ₽</span></td>
                                            <td class="product-quantity"><?= $item1->count ?> </td>
                                            <td class="product-subtotal"><?= $item1->product->price * $item1->count; ?> ₽</td> 
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                           
                        </form> 
                    </div>
                </div>
            </div>
        </div>