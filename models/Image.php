<?php

namespace app\models;

use Yii;
use yii\base\Model;

use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Image extends ActiveRecord
{
public static function tableName(){
	return 'file';
}
 public function rules()
    {
        return [
            [['file', 'id_products'], 'required'],
            ['file', 'image'],
        ];
    }
}
?>