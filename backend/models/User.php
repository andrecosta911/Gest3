<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $idUser
 * @property string $username
 * @property string $nome
 * @property string $password_hash
 * @property string $email
 * @property integer $estado
 * @property integer $tipo
 */
class User extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['username', 'nome', 'email'], 'required', 'message' => 'O preenchimento deste campo é obrigatório'],
                [['tipo'], 'integer'],
                [['nome'], 'validateName'],
                [['username', 'email', 'nome'], 'string', 'max' => 255],
                [['username'], 'unique', 'message' => 'Este username já se encontra atribuído'],
                [['email'], 'unique', 'message' => 'Este email já se encontra atribuído'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'idUser' => 'ID',
            'nome' => 'Nome',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'email' => 'Email',
            'estado' => 'Estado',
            'tipo' => 'Tipo de Utilizador',
        ];
    }

    public function validateName() {
        if (!preg_match('/^[\sa-zA-zàÀáÁâÂãÃéÉèÈêÊìÌíÍîÎòÒóÓôÔõÕúÚùÙûÛäöÄÖ]+$/i', $this->nome)) {
            $this->addError('nome', 'O conteúdo deste campo não é válido');
        }
    }

}
