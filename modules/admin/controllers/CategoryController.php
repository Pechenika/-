<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Category;
use app\modules\admin\models\Subcategory;
use app\modules\admin\models\CompletedOrder;
use app\modules\admin\models\ProductOrder;
use app\modules\admin\models\Product;
use app\models\Image;
use app\modules\admin\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
{
    /**
     * @inheritDoc
     */
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

    /**
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort->defaultOrder = ['id' => SORT_DESC];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Category model.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
        $pic = $model->url;
        if($model->load(\Yii::$app->request->post())){
			if($model->url = UploadedFile::getInstance($model, 'url')){
				$fileName= time().'_category.'.$model->url->extension;
				if($model->url->saveAs('../web/image/'.$fileName)){ //./web/image/image5.png
					if(file_exists($pic)){
						unlink($pic);
					}
					$model->url = '../web/image/'.$fileName;
				}
				
			}else {
				$model->url = $pic;
			}
			$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
		}
                return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pic = $model->url;
        if($model->load(\Yii::$app->request->post())){
			if($model->url = UploadedFile::getInstance($model, 'url')){
				$fileName= time().'_category.'.$model->url->extension;
				if($model->url->saveAs('../web/image/'.$fileName)){ //./web/image/image5.png
					if(file_exists($pic)){
						unlink($pic);
					}
					$model->url = '../web/image/'.$fileName;
				}
				
			}else {
				$model->url = $pic;
			}
			$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
		}
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
   /* protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            if(($model2 = Subcategory::find()->where(['id_parent' => $id])->all()) !== null){
            foreach($model2 as $item){
                $item->delete();
            }
            return $model;
            }
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    */
     protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            if(($model2 = Subcategory::find()->where(['id_parent' => $id])->all()) !== null){
                foreach($model2 as $item){
                    if(($model3 = Product::find()->where(['id_subcategory' => $item->id])->all()) !== null){
                        foreach($model3 as $item1){
                            if(($model6 = Image::find()->where(['id_products' => $item1->id])->all()) !== null){
                                foreach($model6 as $item3){
                                     $item3->delete();
                                }
                            }
                            if(($model4 = ProductOrder::find()->where(['id_product' => $item1->id])->all()) !== null){
                                foreach($model4 as $item2){
                                    if(($model5 = CompletedOrder::find()->where(['id' => $item2->id_order])->all()) !== null){
                                        foreach($model5 as $item4){
                                            if(($model6 = ProductOrder::find()->where(['id_order' => $item4->id])->all()) !== null){
                                                foreach($model6 as $item5){
                                                    $item5->delete();
                                                }

                                                 return $model;
                                            }
                                        

                                        $item4->delete();
                                        }
                                    }
                                    
                                }
                            } 
                            $item1->delete();
                        }
                    }
                    $item->delete();
                }
           
            }
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
