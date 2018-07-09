<?php

namespace backend\modules\docente\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\docente\models\Docente;
use backend\models\Aluno;

/**
 * DocenteSearch represents the model behind the search form about `backend\modules\docente\models\Docente`.
 */
class DocenteSearch extends Docente {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['idDocente', 'criado_em', 'atualizado_em', 'estado'], 'integer'],
                [['nome', 'email', 'area_cientifica_idArea', 'username', 'password_hash', 'genero'], 'safe'],
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
        $query = Docente::find();

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
            'idDocente' => $this->idDocente,
            'criado_em' => $this->criado_em,
            'atualizado_em' => $this->atualizado_em,
            'estado' => $this->estado,
                //'area_cientifica_idArea' => $this->area_cientifica_idArea,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'username', $this->username])
                ->andFilterWhere(['like', 'password_hash', $this->password_hash])
                ->andFilterWhere(['like', 'genero', $this->genero])
                ->andFilterWhere(['like', 'area_cientifica.designacao', $this->area_cientifica_idArea]);

        return $dataProvider;
    }

    public function studentSearch() {
        $query = Aluno::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query->andFilterWhere([
            'tutor' => $this->idDocente,
        ]);
        
        return $dataProvider;
        
    }    
}
