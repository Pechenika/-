<?php

namespace app\components;


use yii\base\Widget;
use yii\db\ActiveRecord;
use app\models\Category;
use app\models\Subcategories;

use app\models\ProductProperty;
use app\models\SubcatProperty;
use app\models\Property;
use app\models\ValueProperty;

class FiltersWidget extends Widget{
	public function run(){
	//var_dump($_GET);
	//if($_GET && !$_GET['param'] ){
		//var_dump($_GET);
		$subc = $_GET['id'];

		//$property = ProductProperty::find()->where(['id_product' => $id])->all();
        $subcat = SubcatProperty::find()->where(['id_subcat' => $subc])->all();
        $name_property = Property::find()->all();
		$values_prop = ProductProperty::find()->all();
		$values_prop1 = ProductProperty::find()->select(['id_value'])->distinct()->all();
		//var_dump($subcat);
		$values = ValueProperty::find()->all();
		return $this->render('filter', compact('subcat', 'name_property', 'values', 'values_prop'));
	}
	}
//}
?>