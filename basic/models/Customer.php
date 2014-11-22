<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property string $customer_id
 * @property string $customer_name
 * @property string $customer_password
 * @property string $custmer_email
 * @property boolean $customer_role
 *
 * @property Order[] $orders
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name', 'customer_password', 'custmer_email'], 'required'],
            [['customer_role'], 'boolean'],
            [['customer_name', 'customer_password'], 'string', 'max' => 30],
            [['custmer_email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'customer_name' => 'Customer Name',
            'customer_password' => 'Customer Password',
            'custmer_email' => 'Custmer Email',
            'customer_role' => 'Customer Role',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customer_id' => 'customer_id']);
    }
}
