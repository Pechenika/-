<?php

namespace app\models;
use Yii;
use yii\base\Model;
use app\modules\admin\models\Product;
use app\modules\admin\models\Subcategory;
use yii\db\ActiveRecord;
use yii\data\ActiveDataProvider;

/**
 * ContactForm is the model behind the contact form.
 */
class Home extends ActiveRecord
{
    public $search;
    public static function tableName(){
	    return 'product';
    }
   
    public function rules(){
        return [
            ['search', 'string'],
        ];
    }
    public function scenarios(){
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function getSearchResult($params) {

           $dataProvider = new ActiveDataProvider([
            'query' => $query,
           ]);

           $query = Product::find();
           $this->load($params);
           
           $query->andFilterWhere(['like', 'name', $this->search]);
           return $dataProvider;
        }

}
?>