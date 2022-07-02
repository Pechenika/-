<?php

namespace app\modules\admin\models;
use Yii;
use yii\base\Model;
use app\modules\admin\models\Shop;
use app\modules\admin\models\Subcategory;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Product extends ActiveRecord
{
public static function tableName(){
	return 'product';
}
public function getShop()
{
    return $this->hasOne(Shop::className(), ['id' => 'id_shop']);
}
public function getSubcategory()
{
    return $this->hasOne(Subcategory::className(), ['id' => 'id_subcategory']);
}
public function rules()
    {
        return [
            [[ 'price', 'id_subcategory', 'count', 'opt_count'], 'integer'],
            [[ 'price', 'id_shop', 'id_subcategory', 'name', 'description', 'image', 'count', 'price_opt'], 'required'],
            [['name', 'description', 'price_opt', 'old_price'], 'safe'],
            ['image', 'image'],
        ];
    }
}
?>