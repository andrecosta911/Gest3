<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programa_doutoral".
 *
 * @property integer $idPrograma
 * @property string $designacao
 * @property integer $duracao
 * @property integer $ECTS
 * @property integer $docente_idDocente
 * @property integer $area_cientifica_idArea
 *
 * @property AreaCientifica $areaCientificaIdArea
 * @property Docente $docenteIdDocente
 */
class ProgramaDoutoral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'programa_doutoral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPrograma', 'designacao', 'duracao', 'ECTS', 'docente_idDocente', 'area_cientifica_idArea'], 'required'],
            [['idPrograma', 'duracao', 'ECTS', 'docente_idDocente', 'area_cientifica_idArea'], 'integer'],
            [['designacao'], 'string', 'max' => 255],
            [['designacao'], 'unique'],
            [['area_cientifica_idArea'], 'exist', 'skipOnError' => true, 'targetClass' => AreaCientifica::className(), 'targetAttribute' => ['area_cientifica_idArea' => 'idArea']],
            [['docente_idDocente'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['docente_idDocente' => 'idDocente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPrograma' => 'Id Programa',
            'designacao' => 'Designacao',
            'duracao' => 'Duracao',
            'ECTS' => 'Ects',
            'docente_idDocente' => 'Docente Id Docente',
            'area_cientifica_idArea' => 'Area Cientifica Id Area',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaCientificaIdArea()
    {
        return $this->hasOne(AreaCientifica::className(), ['idArea' => 'area_cientifica_idArea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocenteIdDocente()
    {
        return $this->hasOne(Docente::className(), ['idDocente' => 'docente_idDocente']);
    }
}
