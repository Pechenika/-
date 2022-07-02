<!--div class="" style="text-align: left;">
<h3>Вы успешно оформили заказ</h3><br>
<p>На сумму: <?= $session['bascket.sum']?> ₽</p><br>
 <table class="table table-bordered">
                        <tr>
                            <th>Наименование</th>
                            <th>шт</th>
                            <th>Цена, руб.</th>
                            <th>Сумма, руб.</th>
                            
                        </tr>
                        <?php foreach ($session['bascket'] as $id=>$item): ?>
                        <?php if($id>=1): ?>    
                        <tr>
                                <td><?= $item['name']; ?><br><img src="<?= $item['image'];?>" style="width:40px;"></td>
                                
                                <td class="">
                                    <?= $item['count']; ?>
                                </td>
                                
                                <td class="text-right"><?= $item['price']; ?></td>
                                <td class="text-right"><?= $item['price'] * $item['count']; ?></td>
                              
                            </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
</div-->
<div class="cart-main-area ptb--120 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form action="#">               
                            <div class="table-content table-responsive">
                            <h3>Вы успешно оформили заказ</h3><br>
<p>На сумму: <?= $session['bascket.sum']?> ₽</p><br>
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
                                    <?php foreach ($session['bascket'] as $id=>$item): ?>
                                            <?php if($id>=1): ?>   
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="<?= $item['image'];?>" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#"><?= $item['name']; ?></a></td>
                                            <td class="product-price"><span class="amount"><?= $item['price']?></span></td>
                                            <td class="product-quantity"><?= $item['count']?></td>
                                            <td class="product-subtotal"><?= $item['price'] * $item['count']; ?></td>
                                         
                                            
                                
                                            
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