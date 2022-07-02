<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\Controller;
use app\models\Category;
use app\models\Subcategories;
use app\models\Product;
use app\models\Home;
use app\models\Registration;

class HomeController extends Controller
{
public $search;
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post', 'get'],
                ],
            ],
        ];
    }

    public function actionSearch() {
       $model = new Home();
       $model2 = Product::findOne($search);
       $dataProvider = $model->getSearchResult($this->request->queryParams);
       return $this->render(
            'productSearch', compact('model2')
       );
    }


	public function actionIndex(){
        $this->layout = '@app/views/layouts/templateHome';
		$model = new Category();

		$data = Category::find()->all();
        $data2 = Subcategories::find()->all();

        $data3 = Product::find()->orderBy(['id' => SORT_DESC])->all();
        
		return $this->render('home', compact('data', 'data2', 'data3'));
	}

	public function actionCatalog($id){
        $this->layout = '@app/views/layouts/template';
		$data = Subcategories::find()->where(['id_parent' => $id])->all();

		return $this->render('catalog', compact('data'));	
	}

	public function actionProduct($id){ 
		$this->layout = '@app/views/layouts/template';
        $data = Product::find()->where(['id_subcategory' => $id])->all();

		return $this->render('products', compact('data'));	
	}

	public function actionDiscription($id){ 
        $this->layout = '@app/views/layouts/template';
        $data = Product::find()->where(['id' => $id])->all();

		return $this->render('discription', compact('data'));	
	}

	public function actionLogin(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) { 
            return $this->render('admin');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegistration(){
        if(!Yii::$app->user->isGuest) return $this->goHome();

        $model = new Registration();
        
        if ($model->load(Yii::$app->request->post())) { //загрузка текстовых данных
           if($model->validate()){
                $model->password = md5($model->password);
                $model->id_role = 2;
				$model->save(false);
                return $this->redirect('/home/index');
           }
        }
        return $this->render('registr', [
            'model' => $model,
        ]);
    }
	public function actionLogout(){
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
?>