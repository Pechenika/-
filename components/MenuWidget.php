<?php

namespace app\components;


use yii\base\Widget;
use yii\db\ActiveRecord;
use app\models\Category;
use app\models\Subcategories;


class MenuWidget extends Widget{
	public function run(){
		$category = \app\models\Category::find()->select('id, name, url')->asArray()->orderBy('name')->all();
		$subcategory = \app\models\Subcategories::find()->select('id, name, id_parent')->asArray()->orderBy('name')->all();
		//var_dump($category);
		//return $this->render('menu', copmact('category'));
		return $this->render('menu', compact('category', 'subcategory'));
	}
}
?>