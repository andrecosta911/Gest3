<?php

namespace backend\modules\docente\models;

use Yii;
use backend\modules\docente\models\AreaCientifica;

/**
 * This is the model class for table "docente".
 *
 * @property integer $idDocente
 * @property string $nome
 * @property string $email
 * @property string $username
 * @property string $password_hash
 * @property string $genero
 * @property integer $criado_em
 * @property integer $atualizado_em
 * @property integer $estado
 * @property integer $area_cientifica_idArea
 *
 * @property AreaCientifica $areaCientificaIdArea
 */
class Docente extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'docente';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['idDocente', 'nome', 'email', 'genero', 'area_cientifica_idArea'], 'required', 'message' => 'O preenchimento deste campo é obrigatório'],
                [['idDocente', 'area_cientifica_idArea'], 'integer', 'message' => 'O conteúdo deste campo não é válido'],
                [['idDocente'], 'unique', 'message' => 'Este número de docente já se encontra atribuído'],
                [['nome'], 'validateName'],
                [['nome', 'email'], 'string', 'max' => 255],
                [['genero'], 'string'],
                [['email'], 'email', 'message' => 'Por favor, indique um e-mail válido.'],
                [['email'], 'unique', 'message' => 'Este endereço de email já se encontra atribuído'],
                [['area_cientifica_idArea'], 'exist', 'skipOnError' => true, 'targetClass' => AreaCientifica::className(), 'targetAttribute' => ['area_cientifica_idArea' => 'idArea']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'idDocente' => 'Número de Docente',
            'nome' => 'Nome',
            'email' => 'Email',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'genero' => 'Genero',
            'criado_em' => 'Criado Em',
            'atualizado_em' => 'Atualizado Em',
            'estado' => 'Estado',
            'area_cientifica_idArea' => 'Area Cientifica',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaCientificaIdArea() {
        return $this->hasOne(AreaCientifica::className(), ['idArea' => 'area_cientifica_idArea']);
    }

    public function validateName() {
        if (!preg_match('/^[\sa-zA-zàÀáÁâÂãÃéÉèÈêÊìÌíÍîÎòÒóÓôÔõÕúÚùÙûÛäöÄÖ]+$/i', $this->nome)) {
            $this->addError('nome', 'O conteúdo deste campo não é válido');
        }
    }

}
