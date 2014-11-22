<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrderDetail;

/**
 * OrderDetailSearch represents the model behind the search form about `app\models\OrderDetail`.
 */
class OrderDetailSearch extends OrderDetail
{
    public function rules()
    {
        return [
            [['id_order', 'order_id', 'product_id', 'order_quantity'], 'integer'],
            [['product_price'], 'number'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = OrderDetail::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_order' => $this->id_order,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'product_price' => $this->product_price,
            'order_quantity' => $this->order_quantity,
        ]);

        return $dataProvider;
    }
}
