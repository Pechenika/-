<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class MatrixForm extends Model
{
    public $row;
    public $col;
    public $min;
    public $max;
    public $type;

    public function rules()
    {
        return [
            [['row', 'col', 'min', 'max', 'type'], 'required'],
        ];
    }


    public function Generate($row, $col, $max, $min, $type){
        //if(!$this->hasErrors()){
        $type = $this->type;
        $row = $this->row;
        $col = $this->col;
        $min = $this->min;
        $max = $this->max;
        $arr=[];

        if($type == 1){
            for($i = 0; $i<$row;$i++){
                for($j=0; $j<$col; $j++){
                   $arr[$i][$j] = rand($min, $max); 
                }
            }
        }
        else if($type == 3){
            for($i = 0; $i<$row;$i++){
                for($j=0; $j<$col; $j++){
                    if($i == $j ) $arr[$i][$j] = rand($min, $max); 
                    if($i < $j ) $arr[$i][$j] = 0;
                    else $arr[$i][$j] = rand($min, $max); 
                }
            } 
        }
         else if($type == 2){
          for($i = 0; $i<$row;$i++){
                for($j=0; $j<$col; $j++){
                    if($i == $j ) $arr[$i][$j] = rand($min, $max); 
                    if($i > $j ) $arr[$i][$j] = 0;
                    else $arr[$i][$j] = rand($min, $max); 
                }
            } 
         }
            return ($arr);
       // }
    }
    
}

?>