<?php

namespace app\modules\admin\models;
use Yii;
use yii\base\Model;
use app\modules\admin\models\Category;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Subcategory extends ActiveRecord
{
public static function tableName(){
	return 'subcategories';
}
public function getCategory()
{
    return $this->hasOne(Category::className(), ['id' => 'id_parent']);
}
 public function rules()
    {
        return [
            [['id_parent', 'name'], 'required'],
            [['id_parent'], 'integer'],
           
        ];
    }
}
?>