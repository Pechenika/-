<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
?>
<div class="col-lg-12" style="width: 730px;display: flex; flex-wrap: wrap;">

<?php
	foreach($model2 as $product){
		echo ('<div class="" style="margin-top: 30px; ">
				<div class="" style="margin-left: 60px; text-align: left; width: 172px;
					height: 229px; ">
					<a href="discription/'.$product->id.'"> <img src="'.$product->image.'" style="Width: 138px; Height: 138px; "></a>
					<h5 style="color: #333; font-weith: bold; margin-top: 42px;">'.$product->name.'</h5>
					<h4 style="color: #333; font-weith: bold;">'.$product->price.'₽/шт</h4>
				</div>
				<div class="" style="Width: 122px; Height: 37px; border-Radius: 7px; border: none; background-color: #14A82B;
				margin-top: 39px; margin-left: 60px;">
					<a style="color:white;" href="/baskcet/'.$product->id.'" data-id="'.$product->id.'" 
					data-count="1" class="add" id="add">В корзину</a>
				</div>
				');
				?>
			<?php echo ('</div>');
		}
	?>

</div>