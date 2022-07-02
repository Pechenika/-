<style>
body {font-family: 'Montserrat', sans-serif;}
.product-thumbnail {
    border: 1px solid #ddd;
}
tr {
    border: 1px solid #ddd;
}
</style>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
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
                            

                                <table >
                                    <thead>
                                        <tr>
                                            <th class=""></th>
                                            <th class="product-name">Название</th>
                                            <th class="product-price">Стоимость за шт</th>
                                            <th class="product-quantity">Количество товара</th>
                                            <th class="product-subtotal">Стоимость позиции товара</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                   
                                        <?php foreach ($order as $item1): ?> 
                                       
                                        <tr >
                                            <td class="product-thumbnail"><img style="width: 150px;" src="https://<?=$_SERVER['SERVER_NAME'];?><?= $item1->product->image; ?>" alt="product img" /></td>
                                            <td class="product-name"><?= $item1->product->name; ?></td>
                                            <td class="product-quantity"><?= $item1->product->price?> ₽</td>
                                            <td class="product-quantity"><?= $item1->count ?> шт. </td>
                                          
                                            
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
    </body>