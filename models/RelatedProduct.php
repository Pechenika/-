<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class RelatedProduct extends ActiveRecord
{
public static function tableName(){
	return 'related_product';
}

public function getSubcategory()
{
    return $this->hasMany(Subcategory::className(), ['id_cat' => 'id_subcategory']);
}
public function getSubcategory1()
{
    return $this->hasMany(Subcategory::className(), ['id_cat_related' => 'id_subcategory']);
}
}