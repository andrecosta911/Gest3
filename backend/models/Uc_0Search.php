<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Uc_0;

/**
 * Uc_0Search represents the model behind the search form about `backend\models\Uc_0`.
 */
class Uc_0Search extends Uc_0 {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['idUc0'], 'integer'],
                [['designacao', 'area_cientifica_idArea'], 'safe'],
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
        $query = Uc_0::find();

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

        //return Area_Cientifica name
        $query->joinWith('areaCientificaIdArea');

        // grid filtering conditions
        $query->andFilterWhere([
            'idUc0' => $this->idUc0,
                //'area_cientifica_idArea' => $this->area_cientifica_idArea,
        ]);

        $query->andFilterWhere(['like', 'designacao', $this->designacao])
                ->andFilterWhere(['like', 'area_cientifica.designacao', $this->area_cientifica_idArea]);

        return $dataProvider;
    }

}
