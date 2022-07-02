<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;
use app\models\Bascket;

class BaskcetController extends Controller
{
	public function actionIndex(){
	$this->layout = false;  
		return $this->render('index');
	}
	
	public function actionAdd(){
		$id = (int)Yii::$app->request->get('id');
		$count = (int)Yii::$app->request->get('count');
		
		$count = !$count ? 1 : $count;

		$model = Product::findOne($id);
		$countModelOpt = $model->opt_count;
		if(empty($model)) return false;

		$session = Yii::$app->session;
		$session->open();
		$bascket = new Bascket();

		$ses = $bascket->add($model, $count, $countModelOpt);

		$this->layout = false; 

		return $ses;
	}

	public function actionShow(){
		$session = Yii::$app->session;
		$session->open();
		$this->layout = false;
		
		return $this->render('index', compact('session'));
	}

	public function actionDelete(){
		$id = (int)Yii::$app->request->get('id');

		$session = Yii::$app->session;
		$session->open();

		
		$model = Product::findOne($id);
		if(empty($model)) return false;
		//var_dump($model);
		$bascket = new Bascket();
		$bascket->reculc($id);

		$this->layout = false;  
		return $this->render('index', compact('session'));
	}

	/*public function actionClear(){
		$session = Yii::$app->session;
		$session->open();
		$session->remove('bascket');
		$session->remove('bascket.count');
		$session->remove('bascket.sum');

		$this->layout = false;  
		return $this->render('index', compact('session'));
	}*/

	public function actionRemove(){
		$id = (int)Yii::$app->request->get('id');
		$count = (int)Yii::$app->request->get('count');

		$model = Product::findOne($id);

		$countModel = $model->count;
		$countModelOpt = $model->opt_count;
		$priceOpt = $model->price_opt;
		if(empty($model)) return false;
		

		$session = Yii::$app->session;
		$session->open();
		$bascket = new Bascket();

		$data = $bascket->clearOne($id, $countModelOpt, $count, $countModel, $priceOpt);
		$this->layout = false; 

		return $this->render('index', compact('session'));
		}

	public function actionPlus(){
		$id = (int)Yii::$app->request->get('id');
		$count = (int)Yii::$app->request->get('count');
		
		$count = !$count ? 1 : $count;

		$model = Product::findOne($id);

		$countModel = $model->count;
		$countModelOpt = $model->opt_count;
		$priceOpt = $model->price_opt;

		if(empty($model)) return false;
		

		$session = Yii::$app->session;
		$session->open();
		$bascket = new Bascket();

		$count_res = $bascket->plus($id, $countModelOpt, $count, $countModel, $priceOpt);
		
		//if($count_res == $countModel) return false;
		//if($countNext <= 5 ) return false;
		$this->layout = false;  //откючение шаблона

		return $this->render('index',  compact('session'));
	}

}

?>