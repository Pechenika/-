<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Product;
use app\modules\admin\models\Shop;

class ProductSearch extends Product
{
    public function rules()
    {
        return [
            [['price'], 'integer'],
            [['name', 'description', 'image', 'id_shop', 'id_subcategory'], 'safe'],
            ['image', 'image']
        ];
    }
    public function getShop()
{
    return $this->hasOne(Shop::className(), ['id' => 'id_shop']);
}
    public function scenarios()
    {
        return Model::scenarios();
    }
    public function search($params)
    {
        $this->load($params);
       $query = null;
       if(isset($this->id_shop) && !empty($this->id_shop)){

              $query = Product::find()->innerJoin('shop', 'shop.id = product.id_shop')->andFilterWhere(['like', 'shop.adress', $this->id_shop]);
       }
       else if(isset($this->id_subcategory) && !empty($this->id_subcategory)){
              $query = Product::find()->innerJoin('subcategories', 'subcategories.id = product.id_subcategory')->andFilterWhere(['like', 'subcategories.name', $this->id_subcategory]);
       }
       else {
              $query = Product::find();
       }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        $query->andFilterWhere([
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'price', $this->price]);
        return $dataProvider;
    }
}
