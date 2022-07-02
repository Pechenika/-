<?php

namespace app\modules\admin\models;
use Yii;
use yii\base\Model;
use app\modules\admin\models\ProductOrder;
use app\modules\admin\models\Product;
use app\modules\admin\models\Shop;
use app\modules\admin\models\Payment;
use app\modules\admin\models\Delivery;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class CompletedOrder extends ActiveRecord
{
public static function tableName(){
	return 'completed_order';
}
public function getProductOrder()
{
    return $this->hasMany(ProductOrder::className(), ['id_order' => 'id']);
}
public function getProduct()
{
$product = Product::find();
    return $product;
}
public function getShop()
{
    return $this->hasOne(Shop::className(), ['id' => 'id_shop']);
}
public function getPayment()
{
    return $this->hasOne(Payment::className(), ['id' => 'id_payment']);
}
public function getDelivery()
{
    return $this->hasOne(Delivery::className(), ['id' => 'id_delivery']);
}
 public function rules()
    {
        return [
            [['id_payment',  'id_shop', 'total_price', 'id_delivery'], 'integer'],
            [['name_user', 'surname_user', 'date', 'note', 'adress'], 'safe'],
           
        ];
    }
}
?>