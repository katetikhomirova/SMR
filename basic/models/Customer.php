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
            [['customer_email'], 'string', 'max' => 50],
			[['customer_email'],'email'],
			[['customer_name', 'customer_email'], 'trim'],
			[['customer_name', 'customer_email'], 'unique'],
			[['customer_password'], 'string', 'max' => 10],
			[['customer_password'], 'string', 'min' => 6],
			[['customer_password'], 'match', 'pattern'=>'/[A-Z]{1}/', 'message' => 'Password must contain at least 1 capital letter.'],
			[['customer_password'], 'match', 'pattern'=>'/\d+/', 'message' => 'Password must contain at least 1 number.'],
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
