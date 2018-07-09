<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Uc_1;

/**
 * Uc_1Search represents the model behind the search form about `backend\models\Uc_1`.
 */
class Uc_1Search extends Uc_1
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUc1', 'area_cientifica_idArea'], 'integer'],
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
        $query = Uc_1::find();

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
            'idUc1' => $this->idUc1,
            'area_cientifica_idArea' => $this->area_cientifica_idArea,
        ]);

        $query->andFilterWhere(['like', 'designacao', $this->designacao]);

        return $dataProvider;
    }
}
