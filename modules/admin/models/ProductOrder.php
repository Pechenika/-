<?php

namespace app\modules\admin\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use app\modules\admin\models\Product;
use app\modules\admin\models\CompletedOrder;
/**
 * ContactForm is the model behind the contact form.
 */
class ProductOrder extends ActiveRecord
{
public static function tableName(){
	return 'products_order';
}
 public function rules()
    {
        return [
            [['id', 'id_product', 'count', 'id_order'], 'integer'],
        ];
    }
public function getProduct()
{
    return $this->hasOne(Product::className(), ['id' => 'id_product']);
}
public function getCompletedOrder()
{
    return $this->hasOne(CompletedOrder::className(), ['id' => 'id_order']);
}
}
?>