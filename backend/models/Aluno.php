<?php

namespace backend\models;

use Yii;
use backend\modules\docente\models\Docente;

/**
 * This is the model class for table "aluno".
 *
 * @property integer $idAluno
 * @property string $nome
 * @property string $data_nascimento
 * @property string $email
 * @property string $genero
 * @property integer $tutor
 *
 * @property Docente $tutor
 */
class Aluno extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'aluno';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['idAluno', 'nome', 'data_nascimento', 'email', 'genero', 'tutor'], 'required', 'message' => 'O preenchimento deste campo é obrigatório'],
                [['idAluno'], 'integer', 'max' => 150000, 'message' => 'O conteúdo deste campo não é válido'],
                [['idAluno'], 'unique', 'message' => 'Este número de aluno já se encontra atribuído'],
            //[['data_nascimento'], 'validateDate'],
                [['data_nascimento'], 'date', 'format' => 'dd-mm-yyyy'],
                [['genero'], 'string'],
                [['nome'], 'validateName'],
                [['email'], 'email', 'message' => 'Por favor, indique um e-mail válido.'],
                [['email'], 'unique', 'message' => 'Este endereço de email já se encontra atribuído'],
                [['tutor'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['tutor' => 'idDocente'],],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'idAluno' => 'Número de Aluno',
            'nome' => 'Nome',
            'data_nascimento' => 'Data de Nascimento',
            'email' => 'Email',
            'genero' => 'Género',
            'tutor' => 'Tutor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutor() {
        return $this->hasOne(Docente::className(), ['idDocente' => 'tutor']);
    }

    public function validateName() {
        if (!preg_match('/^[\sa-zA-zàÀáÁâÂãÃéÉèÈêÊìÌíÍîÎòÒóÓôÔõÕúÚùÙûÛäöÄÖ]+$/i', $this->nome)) {
            $this->addError('nome', 'O conteúdo deste campo não é válido');
        }
    }
}
