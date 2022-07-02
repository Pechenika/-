<?php

namespace app\modules\admin\controllers;

use app\modules\admin\models\Subcategory;
use app\modules\admin\models\SubcategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * SubcategoryController implements the CRUD actions for Subcategory model.
 */
class SubcategoryController extends Controller
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
     * Lists all Subcategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubcategorySearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort->defaultOrder = ['id' => SORT_DESC];
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subcategory model.
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
     * Creates a new Subcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subcategory();

        
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        /*if($model->load(\Yii::$app->request->post())){
			if($model->url = UploadedFile::getInstance($model, 'url')){
				$fileName= time().'_subcategory.'.$model->url->extension;
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
		}*/
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Subcategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
       // $pic = $model->url;
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
       /* if($model->load(\Yii::$app->request->post())){
			if($model->url = UploadedFile::getInstance($model, 'url')){
				$fileName= time().'_subcategory.'.$model->url->extension;
				if($model->url->saveAs('/web/image/'.$fileName)){ //./web/image/image5.png
					if(file_exists($pic)){
						unlink($pic);
					}
					$model->url = '/web/image/'.$fileName;
				}
				
			}else {
				$model->url = $pic;
			}
			$model->save();
            return $this->redirect(['view', 'id' => $model->id]);
		}*/
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Subcategory model.
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

    /**
     * Finds the Subcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return Subcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subcategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}