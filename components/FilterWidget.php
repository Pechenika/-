<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use yii\db\ActiveRecord;
use app\models\Bascket;
use app\models\Subcategories;


class FilterWidget extends Widget{
	public function run(){
		//$bascket = new Bascket();
		$category = \app\models\Category::find()->select('id, name')->asArray()->orderBy('name')->all();
		$subcategory = \app\models\Subcategories::find()->select('id, name, id_parent')->asArray()->orderBy('name')->all();
		return $this->render('filter_mobile', compact('category', 'subcategory'));
	}
}
?>