<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comment;

/**
 * CommentSearch represents the model behind the search form about `app\models\Comment`.
 */
class CommentSearch extends Comment
{
    public function rules()
    {
        return [
            [['comment_id', 'comment_estimate'], 'integer'],
            [['comment_value'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Comment::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'comment_id' => $this->comment_id,
            'comment_estimate' => $this->comment_estimate,
        ]);

        $query->andFilterWhere(['like', 'comment_value', $this->comment_value]);

        return $dataProvider;
    }
}
