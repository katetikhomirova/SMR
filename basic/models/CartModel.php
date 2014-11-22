<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cart".
 *
 * @property integer $id
 * @property integer $userId
 *
 * @property User $user
 */
class CartModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userId'], 'required'],
            [['id', 'userId'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
