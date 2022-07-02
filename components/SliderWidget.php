<?php

namespace app\components;


use yii\base\Widget;
use yii\db\ActiveRecord;
use app\models\Category;
use app\models\Product;
use app\models\Subcategories;
use yii\data\ActiveDataProvider;

class SliderWidget extends Widget{
	public function run(){
		$product = Product::find()->orderBy(['total_sales' => SORT_DESC])->all();
		return $this->render('slider', compact('product'));
	}
}
?>