<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class FilterController extends Controller
{
	public function actionIndex(){

		return $this->render('index');
	}
	public function actionShow(){
		$category = \app\models\Category::find()->select('id, name')->asArray()->orderBy('name')->all();
		$subcategory = \app\models\Subcategories::find()->select('id, name, id_parent')->asArray()->orderBy('name')->all();
		$this->layout = false;
		return $this->render('index', compact('category', 'subcategory'));
	}

}

?>