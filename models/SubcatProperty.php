<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subcat_property".
 *
 * @property int $id
 * @property int $id_subcat
 * @property int $id_property
 *
 * @property ProductProperty[] $productProperties
 * @property Property $property
 * @property Subcategories $subcat
 */
class SubcatProperty extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subcat_property';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_subcat', 'id_property'], 'required'],
            [['id_subcat', 'id_property'], 'integer'],
            [['id_property'], 'exist', 'skipOnError' => true, 'targetClass' => Property::className(), 'targetAttribute' => ['id_property' => 'id']],
            [['id_subcat'], 'exist', 'skipOnError' => true, 'targetClass' => Subcategories::className(), 'targetAttribute' => ['id_subcat' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_subcat' => 'Id Subcat',
            'id_property' => 'Id Property',
        ];
    }

    /**
     * Gets query for [[ProductProperties]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductProperties()
    {
        return $this->hasMany(ProductProperty::className(), ['id_subcat_property' => 'id']);
    }

    /**
     * Gets query for [[Property]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(Property::className(), ['id' => 'id_property']);
    }

    /**
     * Gets query for [[Subcat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubcat()
    {
        return $this->hasOne(Subcategories::className(), ['id' => 'id_subcat']);
    }
}
