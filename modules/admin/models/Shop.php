<?php

namespace app\modules\admin\models;
use Yii;
use yii\base\Model;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Shop extends ActiveRecord
{
public static function tableName(){
	return 'shop';
}
public function rules()
    {
        return [
            //[['id'], 'integer'],
            [['adress', 'phone'], 'required'],
            [['adress', 'phone'], 'string'],
        ];
    }
}
?>