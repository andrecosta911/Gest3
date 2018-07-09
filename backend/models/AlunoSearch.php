<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Aluno;

/**
 * AlunoSearch represents the model behind the search form about `backend\models\Aluno`.
 */
class AlunoSearch extends Aluno
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idAluno', 'tutor'], 'integer'],
            [['nome', 'data_nascimento', 'email', 'genero'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = Aluno::find();

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
            'idAluno' => $this->idAluno,
            'tutor' => $this->tutor,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'data_nascimento', $this->data_nascimento])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'genero', $this->genero]);

        return $dataProvider;
    }
}
