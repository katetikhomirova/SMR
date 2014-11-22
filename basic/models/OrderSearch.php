<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form about `app\models\Order`.
 */
class OrderSearch extends Order
{
    public function rules()
    {
        return [
            [['order_id', 'customer_id'], 'integer'],
            [['order_date', 'order_delivery_address'], 'safe'],
            [['order_total'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Order::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'order_id' => $this->order_id,
            'order_date' => $this->order_date,
            'order_total' => $this->order_total,
            'customer_id' => $this->customer_id,
        ]);

        $query->andFilterWhere(['like', 'order_delivery_address', $this->order_delivery_address]);

        return $dataProvider;
    }
}
