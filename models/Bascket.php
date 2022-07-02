<?php
namespace app\models;

use yii\base\Model;
use Yii;
use yii\db\ActiveRecord;

class Bascket extends ActiveRecord {

    public function add($model, $count = 1, $countModelOpt){

        if(isset($_SESSION['bascket'][$model->id])){
            $_SESSION['bascket'][$model->id]['count'] += $count;
             $_SESSION['bascket'][$model->id]['sum_product'] =  $_SESSION['bascket'][$model->id]['count'] *  $_SESSION['bascket'][$model->id]['price'];
        }
        else {
            $_SESSION['bascket'][$model->id] = [
                'id_product' => $model->id,
                'count' => (int)$count,
                'price_opt' => $model->price_opt,
                'opt_count' => $model->opt_count,
                'name' => $model->name,
                'price' => (int)$model->price,
                'image'=> $model->image,
                'id_shop' => $model->id_shop,
                'sum_product' => (int)$model->price * (int)$count,
                'message' => '',
            ];
        }
       
        $_SESSION['bascket.count'] = isset($_SESSION['bascket.count']) ? $_SESSION['bascket.count'] + $count : $count;
        $_SESSION['bascket.sum'] = isset($_SESSION['bascket.sum']) ? $_SESSION['bascket.sum'] + $count * (int)$model->price : $count * (int)$model->price;   
        
        return $_SESSION['bascket.count'];
        }

    public function clearOne($id, $countModelOpt, $count, $countModel, $priceOpt){
        if ($_SESSION['bascket'][$id]['count'] <= 0){                   //если пусто
            $_SESSION['bascket.sum'] -= $_SESSION['bascket'][$id]['price'];
              unset($_SESSION['bascket'][$id]); 
        }
        if ($_SESSION['bascket'][$id]['count'] == 1){                       //если 1 товар
              $_SESSION['bascket.sum'] -= $_SESSION['bascket'][$id]['price'];
              $_SESSION['bascket.count'] -= 1;
              unset($_SESSION['bascket'][$id]); 
        }
        else {
            $_SESSION['bascket'][$id]['count'] -= 1;  //было 7-1
            
            if($_SESSION['bascket'][$id]['count'] >= $countModelOpt){   // если опт 
                    $_SESSION['bascket'][$id]['sum_product'] =  $_SESSION['bascket'][$id]['count'] *  $priceOpt;
                    if($_SESSION['bascket'][$id]['count'] >= $countModelOpt){  
                     $_SESSION['bascket.sum'] -= $priceOpt;
                    }
            }
            else if($_SESSION['bascket'][$id]['count'] + 1 == $countModelOpt){     //если опт после вычитания
                     $_SESSION['bascket'][$id]['sum_product'] =  $_SESSION['bascket'][$id]['count'] *  $_SESSION['bascket'][$id]['price'];
                     $cD = $_SESSION['bascket'][$id]['count'] + 1;
                     $delCount =  $cD *  $priceOpt;
                     $_SESSION['bascket.sum'] -= $delCount;
                     $_SESSION['bascket.sum'] += $_SESSION['bascket'][$id]['sum_product'] ;

                     $countNext = $countModelOpt - $_SESSION['bascket'][$id]['count'];
                     if( $countNext <=  4 && $countNext != 1)  $_SESSION['bascket'][$id]['message'] = 'Для изменения цены на оптовую добавьте еще  '.$countNext.'  товара';
                     else if($countNext == 5)  $_SESSION['bascket'][$id]['message'] = 'Для изменения цены на оптовую добавьте еще  '.$countNext.'  товаров';
                     else if($countNext == 1)  $_SESSION['bascket'][$id]['message'] = 'Для изменения цены на оптовую добавьте еще  '.$countNext.'  товар';
                }
                else if($_SESSION['bascket'][$id]['count'] < $countModelOpt){     //если НЕ опт 
                     $_SESSION['bascket'][$id]['sum_product'] =  $_SESSION['bascket'][$id]['count'] *  $_SESSION['bascket'][$id]['price'];
                     $_SESSION['bascket.sum'] -= $_SESSION['bascket'][$id]['price'] ;
                     $countNext = $countModelOpt - $_SESSION['bascket'][$id]['count'];
                     if( $countNext <=  4 && $countNext != 1)  $_SESSION['bascket'][$id]['message'] = 'Для изменения цены на оптовую добавьте еще  '.$countNext.'  товара';
                     else if($countNext == 5)  $_SESSION['bascket'][$id]['message'] = 'Для изменения цены на оптовую добавьте еще  '.$countNext.'  товаров';
                     else if($countNext == 1)  $_SESSION['bascket'][$id]['message'] = 'Для изменения цены на оптовую добавьте еще  '.$countNext.'  товар';
                 }
            else {                                                      
                    $_SESSION['bascket'][$id]['sum_product'] =  $_SESSION['bascket'][$id]['count'] *  $_SESSION['bascket'][$id]['price'];
                    $_SESSION['bascket.sum'] -= $_SESSION['bascket'][$id]['price'];
            }
            $_SESSION['bascket.count'] -=  1;
            $_SESSION['bascket'][$id]['message'] = '';
        }
       
    }

    public function plus($id, $countModelOpt, $count, $countModel, $priceOpt){
         if ($_SESSION['bascket'][$id]['count'] >= $countModel){   //если количество товара юольше количества в БД
                $count_res = $countModel;
                $_SESSION['bascket'][$id]['message'] = '*Вы добавили максимальное количество товара';
                return $count_res;
         }else{
            $_SESSION['bascket'][$id]['count'] += 1;

            if($_SESSION['bascket'][$id]['count'] >= $countModelOpt){  //если опт
                $_SESSION['bascket'][$id]['sum_product'] =  $_SESSION['bascket'][$id]['count'] *  $priceOpt;
                if($_SESSION['bascket'][$id]['count'] == $countModelOpt){
                     $cD = $_SESSION['bascket'][$id]['count'] - 1;
                     $delCount =  $cD *  $_SESSION['bascket'][$id]['price'];
                     $_SESSION['bascket.sum'] -= $delCount;
                     $_SESSION['bascket.sum'] += $_SESSION['bascket'][$id]['sum_product'];

                }
                else if($_SESSION['bascket'][$id]['count'] > $countModelOpt){
                  
                     $_SESSION['bascket.sum'] += $priceOpt;
                }
                
                $_SESSION['bascket'][$id]['message'] = '';
            }
            else {                                                                          //если не опт
                $_SESSION['bascket'][$id]['sum_product'] =  $_SESSION['bascket'][$id]['count'] *  $_SESSION['bascket'][$id]['price'];
                
                $_SESSION['bascket.sum'] += $_SESSION['bascket'][$id]['price'];

                $countNext = $countModelOpt - $_SESSION['bascket'][$id]['count'];
                if( $countNext <=  4 && $countNext != 1)  $_SESSION['bascket'][$id]['message'] = 'Для изменения цены на оптовую добавьте еще  '.$countNext.'  товара';
                else if($countNext == 5)  $_SESSION['bascket'][$id]['message'] = 'Для изменения цены на оптовую добавьте еще  '.$countNext.'  товаров';
                else if($countNext == 1)  $_SESSION['bascket'][$id]['message'] = 'Для изменения цены на оптовую добавьте еще  '.$countNext.'  товар';
            }
            $_SESSION['bascket.count'] +=  1;
           
        } 
    }


    public function reculc($id){
       // if(!isset($_SESSION['bascket'][$id])) return false;

        $countAfter = $_SESSION['bascket'][$id]['count'];
        $sumAfter = $_SESSION['bascket'][$id]['sum_product'];
      
        $_SESSION['bascket.count'] -= $countAfter;
        $_SESSION['bascket.sum'] -= $sumAfter;
        unset($_SESSION['bascket'][$id]);
    }
}

