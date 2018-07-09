<?php

namespace backend\modules\docente\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\docente\models\AreaCientifica;

/**
 * AreaCientificaSearch represents the model behind the search form about `backend\modules\docente\models\AreaCientifica`.
 */
class AreaCientificaSearch extends AreaCientifica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idArea'], 'integer'],
            [['designacao'], 'safe'],
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
        $query = AreaCientifica::find();

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
            'idArea' => $this->idArea,
        ]);

        $query->andFilterWhere(['like', 'designacao', $this->designacao]);

        return $dataProvider;
    }
}
