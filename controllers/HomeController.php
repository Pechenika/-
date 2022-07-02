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
use app\modules\admin\models\Shop;

use app\models\ProductProperty;
use app\models\SubcatProperty;
use app\models\Property;
use app\models\RelatedProduct;

use app\models\ContactForm;
use app\models\LoginForm;
use app\models\Image;

use app\models\ValueProperty;
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
     $this->layout = '@app/views/layouts/template';
        $param = Yii::$app->request->get('param');
        // var_dump($param);
        $query = Product::find()->where(['like', 'name', $param])->all();
        $subcat_all = \app\models\Subcategories::find()->all();
        $subcategories_all = [];
        foreach($subcat_all as $item){
            foreach($query as $prod){
                if($item['id'] == $prod['id_subcategory']){
                    $subcategories_all += [$item['id'] => $item['name']] ;
                }
            }
        }
        $subcategories_all = array_unique($subcategories_all);
       return $this->render(
            'search', compact('query', 'param', 'subcategories_all')
       );
    } 


	public function actionIndex(){
        $this->layout = '@app/views/layouts/template';
        
		$model = new Category();

		$data = Category::find()->all();
        $data2 = Subcategories::find()->all();

        $productNew = Product::find()->orderBy(['id' => SORT_ASC])->all();
        $productPopular = Product::find()->where(['>','total_sales', 10])->all();
        
        //$productNew = Product::find()-->all();
        //$productPopular = Product::find()->where(['>','total_sales', 20])->limit(10)->all();

        $category = \app\models\Category::find()->select('id, name')->asArray()->orderBy('name')->all();
		$subcategory = \app\models\Subcategories::find()->select('id, name, id_parent')->asArray()->orderBy('name')->all();
		return $this->render('home', compact('data', 'data2', 'productNew', 'productPopular','category', 'subcategory' ));
        
	}

	public function actionCatalog($id){
        $this->layout = '@app/views/layouts/template';
		$data = Product::find()->all();
        $subcategories_all = \app\models\Subcategories::find()->where(['id_parent' => $id])->all();
        $cat1= Category::find()->where(['id' => $id])->all();
        //var_dump($subcategories_all);
		return $this->render('catalog', compact('data', 'subcategories_all', 'cat1'));	
	}
    public function actionCatalogs(){
        $this->layout = '@app/views/layouts/template';
		$data = Product::find()->all();
        $data1;
        $subcategories_all = \app\models\Subcategories::find()->where(['id_parent' => 2])->all();
        
        //var_dump($subcategories_all);
		return $this->render('catalogs', compact('data', 'subcategories_all'));	
	}

	public function actionProduct($id){ 
		$this->layout = '@app/views/layouts/template';
        $sub_all = \app\models\Subcategories::find()->all();
        $subcat1 = Subcategories::find()->where(['id' => $id])->all();
        $cat1= Category::find()->where(['id' => $subcat1[0]->id_parent])->all();
        $subcategories = \app\models\Subcategories::find()->where(['id' => $id])->all();
        //$subcategories = \app\models\Subcategories::find()->where(['id_parent' => $id])->all();
        //$data = Product::find()->all();
        $data = Product::find()->where(['id_subcategory' => $id])->all();
		return $this->render('products', compact('data', 'subcategories', 'sub_all', 'subcat1', 'cat1'));	
	}

	public function actionDiscription($id){ 
        $this->layout = '@app/views/layouts/template';
        $data = Product::find()->where(['id' => $id])->all();   //инфа о продукте
        $data2 = Product::find()->where(['product_id' => $id])->all();   //?
        $data3 = Product::find()->where(['id_subcategory' =>$data[0]->id_subcategory ])->all(); //похожие

        $shop = Shop::find()->all();
        $image = Image::find()->where(['id_products' => $id])->all();
        $property = ProductProperty::find()->where(['id_product' => $id])->all();
        $cat = SubcatProperty::find()->all();
        $name = Property::find()->all();

        $subcat1 = Subcategories::find()->where(['id' => $data[0]->id_subcategory])->all();
        $cat1= Category::find()->where(['id' => $subcat1[0]->id_parent])->all();

        $values = ValueProperty::find()->all();
        $related_product = RelatedProduct::find()->where(['id_cat' => $data[0]->id_subcategory])->all();
        foreach($related_product as $item){
            $rel_product = Product::find()->where(['id_subcategory' => $item->id_cat_related])->all();
        }
       
		return $this->render('discription', compact('rel_product','data', 'data2', 'data3', 'shop', 'property', 'name', 'cat', 'values', 'image', 'subcat1', 'cat1'));	

	}

	public function actionLogin(){
     $this->layout = '@app/views/layouts/template';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) { 
            return $this->goHome();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

   /* public function actionRegistration(){
     $this->layout = '@app/views/layouts/template';
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
    }*/
	public function actionLogout(){
     $this->layout = '@app/views/layouts/template';
        Yii::$app->user->logout();

        return $this->goHome();
    }
     public function actionAbout()
    {
     $this->layout = '@app/views/layouts/template';
        return $this->render('about');

    }public function actionAgreedata()
    {
     $this->layout = '@app/views/layouts/template';
        return $this->render('agree_data');
    }
     public function actionContact()
    {
     $this->layout = '@app/views/layouts/template';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
}
?>