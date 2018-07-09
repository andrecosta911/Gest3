<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\user;

/**
 * userSearch represents the model behind the search form about `backend\models\user`.
 */
class userSearch extends user {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['idUser', 'estado', 'tipo'], 'integer'],
                [['username', 'password_hash', 'email', 'nome'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = user::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idUser' => $this->idUser,
            'estado' => $this->estado,
            'tipo' => $this->tipo,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
                ->andFilterWhere(['like', 'nome', $this->nome])
                ->andFilterWhere(['like', 'password_hash', $this->password_hash])
                ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }

}
