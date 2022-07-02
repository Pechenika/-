<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Product;
use app\modules\admin\models\ProductOrder;
use app\modules\admin\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class ProductController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort->defaultOrder = ['id' => SORT_DESC];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    public function actionCreate()
    {
        $model = new Product();
        $pic = $model->image;
        $arr = array($model->id_shop);
        //var_dump ($arr);
       
      //  $length = count($arr);
        if($model->load(\Yii::$app->request->post())){
       
       //if(count($arr) > 1){
           for($i = 0; $i < count($arr); $i++){
            
                $arr[$i] = $model->id_shop;
               // var_dump( $arr[$i]);
			    if($model->image = UploadedFile::getInstance($model, 'image')){
				    $fileName= time().'_product.'.$model->image->extension;
				    if($model->image->saveAs('../web/image/'.$fileName)){ 
                   
					    if(file_exists($pic)){
						    unlink($pic);
					    }
					    $model->image = '/web/image/'.$fileName;
                       
                        $model->save();
                        $model = new Product();
				    }
			    }else {
				    $model->image = $pic;
			    }    
		    }
             return $this->redirect(['index', 'id' => $model->id]);
        
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pic = $model->image;
        if($model->load(\Yii::$app->request->post())){
			if($model->image = UploadedFile::getInstance($model, 'image')){
				$fileName= time().'_product.'.$model->image->extension;
				if($model->image->saveAs('../web/image/'.$fileName)){
					if(file_exists($pic)){
						unlink($pic);
					}
					$model->image = '/web/image/'.$fileName;
				}
				
			}else {
				$model->image = $pic;
			}
			$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
		}
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            if(($model2 = ProductOrder::find()->where(['id_product' => $id])->all()) !== null){
            foreach($model2 as $item){
                //$item->delete();
            }
            return $model;
            }
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    } 
}