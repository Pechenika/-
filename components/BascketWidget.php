<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use yii\db\ActiveRecord;
use app\models\Bascket;
use app\models\Subcategories;


class BascketWidget extends Widget{
	public function run(){
		$session = Yii::$app->session;
		$session->open();
		$bascket = new Bascket();
		//<?= Yii::$app->params['pageTitle']; 
		//$bascket->add($model, $count);   как исправить модел???
		/*echo '<a class="show" href="/baskcet/index" style="backgrount-color: blue;"><img class="show" style="width: 20px;" src="/web/image/basket1.svg"><span id="count-bascket">
		'.$session['bascket.count'].'
		</span></a>';
		/*$session = Yii::$app->session;
		$session->open();
		$bascket = new Bascket();

		$bascket->add($model, $count);*/

		return $this->render('bascket', compact('session'));
	}
}
?>