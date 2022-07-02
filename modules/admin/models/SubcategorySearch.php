<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Subcategory;
use app\modules\admin\models\Category;

/**
 * SubcategorySearch represents the model behind the search form of `app\modules\admin\models\Subcategory`.
 */
class SubcategorySearch extends Subcategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['id_parent'], 'integer'],
            [['name', 'url', 'id_parent'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $this->load($params);
        $query = null;
        if(isset($this->id_parent) && !empty($this->id_parent)){
            $query = Subcategory::find()->innerJoin('category', 'category.id = subcategories.id_parent')->andFilterWhere(['like', 'category.name', $this->id_parent]);
         }else {
            $query = Subcategory::find();
        }
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'id_parent' => $this->id_parent,
        ]);

        $query->andFilterWhere(['like', 'subcategories.name', $this->name]);

        return $dataProvider;
    }
}
