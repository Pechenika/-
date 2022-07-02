<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\CompletedOrder;
use app\modules\admin\models\ProductOrder;

/**
 * CompletedOrderSearch represents the model behind the search form of `app\modules\admin\models\CompletedOrder`.
 */
class CompletedOrderSearch extends CompletedOrder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'total_price'], 'integer'],
            [['name_user', 'surname_user', 'date', 'note', 'phone', 'adress', 'id_payment',  'id_shop', 'id_delivery'], 'safe'],
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
        //$query = CompletedOrder::find();
		$query = null;
		if(isset($this->id_payment) && !empty($this->id_payment)){
			$query = CompletedOrder::find()->innerJoin('payment', 'payment.id = completed_order.id_payment')->andFilterWhere(['like', 'payment.type', $this->id_payment]);
		}else if(isset($this->id_shop) && !empty($this->id_shop)){
			$query = CompletedOrder::find()->innerJoin('shop', 'shop.id = completed_order.id_shop')->andFilterWhere(['like', 'shop.adress', $this->id_shop]);
		}else if(isset($this->id_delivery) && !empty($this->id_delivery)){
			$query = CompletedOrder::find()->innerJoin('delivery', 'delivery.id = completed_order.id_delivery')->andFilterWhere(['like', 'delivery.type', $this->id_delivery]);
		}else if(isset($this->id_product) && !empty($this->id_product)){
			$query = CompletedOrder::find()->innerJoin('product', 'product.id = completed_order.id_product')->andFilterWhere(['like', 'product.name', $this->id_product]);
		}else{
			$query = CompletedOrder::find();
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
            //'id_payment' => $this->id_payment,
            //'id_product' => $this->id_product,
            //'count' => $this->count,
            //'id_shop' => $this->id_shop,
            'total_price' => $this->total_price,
            'date' => $this->date,
            //'id_delivery' => $this->id_delivery,
        ]);
        
        $query->andFilterWhere(['like', 'name_user', $this->name_user])
            ->andFilterWhere(['like', 'surname_user', $this->surname_user])
            ->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'completed_order.adress', $this->adress]);

        return $dataProvider;
    }
}
