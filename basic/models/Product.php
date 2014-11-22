<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $product_id
 * @property string $product_name
 * @property double $product_price
 * @property integer $product_quantity
 * @property string $product_description
 * @property string $product_short_descr
 *
 * @property Cart[] $carts
 * @property OrderDetail[] $orderDetails
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_name', 'product_quantity', 'product_description'], 'required'],
            [['product_price'], 'number'],
            [['product_quantity'], 'integer'],
            [['product_name', 'product_short_descr'], 'string', 'max' => 100],
            [['product_description'], 'string', 'max' => 1000],
			[['product_price'], 'double'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'product_price' => 'Product Price',
            'product_quantity' => 'Product Quantity',
            'product_description' => 'Product Description',
            'product_short_descr' => 'Product Short Descr',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['product_id' => 'product_id']);
    }
}
