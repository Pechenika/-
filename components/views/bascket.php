<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>
<!--a href="/baskcet/index" id="show" >
    <li class="cart__menu"><span class="ti-shopping-cart"></span></li>
                
</a-->
<li class="show">
     <a data-toggle="modal" data-target="#bascket" title="Quick View" class="quick-view modal-view detail-link show" id="show" href="/baskcet/index">
         <span class="ti-shopping-cart"  data-target="#bascket" ></span>
     </a>
     <?php if(!empty($session['bascket.count'])): ?><span id="countBascket"  class="countBascket" style="display: flex;"><?= $session['bascket.count']; ?></span><?php endif; ?>
     <?php if(empty($session['bascket.count'])): ?><span id="countBascket"  class="countBascket" style="display: none;"><?= $session['bascket.count']; ?></span><?php endif; ?>
     </li>
              

