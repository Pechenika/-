<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SearchForm extends Model
{
    public $param;
    
    public function rules()
    {
        return [
            
            [['param'], 'string'],
        ];
    }
}
