<?php

namespace backend\models;

use Yii;
use backend\modules\docente\models\AreaCientifica;
use backend\modules\docente\models\Docente;

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
class Programa extends \yii\db\ActiveRecord
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
            [['idPrograma', 'designacao', 'duracao', 'ECTS', 'area_cientifica_idArea'], 'required', 'message' => 'O preenchimento deste campo é obrigatório'],
            [['idPrograma', 'duracao', 'ECTS', 'docente_idDocente', 'area_cientifica_idArea'], 'integer', 'message' => 'O conteúdo deste campo não é válido'],
            [['designacao'], 'string', 'max' => 255],
            [['designacao'], 'validateName'],
            [['docente_idDocente'], 'unique', 'message' => 'Este docente já desempenha a função de diretor de curso num outro programa doutoral'],
            [['idPrograma'], 'unique', 'message' => 'Este código já se encontra atribuído a um outro programa doutoral'],
            [['designacao'], 'unique', 'message' => 'Esta desginação já se encontra atribuída a um outro programa doutoral'],
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
            'idPrograma' => 'Código do Programa',
            'designacao' => 'Designação',
            'duracao' => 'Duração',
            'ECTS' => 'ECTS',
            'docente_idDocente' => 'Diretor de Curso',
            'area_cientifica_idArea' => 'Área Científica',
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
    
        public function validateName(){
        if(!preg_match('/^[\sa-zA-zàÀáÁâÂãÃéÉèÈêÊìÌíÍîÎòÒóÓôÔõÕúÚùÙûÛäöÄÖ]+$/i', $this->designacao)){
            $this->addError('designacao', 'O conteúdo deste campo não é válido');
         }
    }
}
