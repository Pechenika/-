<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_property".
 *
 * @property int $id
 * @property int $id_product
 * @property int $id_subcat_property
 * @property string $value
 *
 * @property Product $product
 * @property SubcatProperty $subcatProperty
 */
class ProductProperty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_property';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_product', 'id_subcat_property', 'value'], 'required'],
            [['id_product', 'id_subcat_property'], 'integer'],
            [['value'], 'string', 'max' => 100],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
            [['id_subcat_property'], 'exist', 'skipOnError' => true, 'targetClass' => SubcatProperty::className(), 'targetAttribute' => ['id_subcat_property' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
            'id_subcat_property' => 'Id Subcat Property',
            'value' => 'Value',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }

    /**
     * Gets query for [[SubcatProperty]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcatProperty()
    {
        return $this->hasOne(SubcatProperty::className(), ['id' => 'id_subcat_property']);
    }
}
