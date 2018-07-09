<?php

namespace backend\models;
use backend\modules\docente\models\AreaCientifica;

use Yii;

/**
 * This is the model class for table "uc_0".
 *
 * @property integer $idUc0
 * @property string $designacao
 * @property integer $area_cientifica_idArea
 *
 * @property Uc[] $ucs
 * @property Uc1[] $uc1s
 * @property AreaCientifica $areaCientificaIdArea
 */
class Uc_0 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uc_0';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUc0', 'designacao'], 'required', 'message' => 'O preenchimento deste campo é obrigatório'],
            [['idUc0', 'area_cientifica_idArea'], 'integer', 'message' => 'O conteúdo deste campo não é válido'],
            [['idUc0'], 'unique', 'message' => 'Este código já se encontra atribuído'],
            [['designacao'], 'string', 'max' => 45],
            [['area_cientifica_idArea'], 'exist', 'skipOnError' => true, 'targetClass' => AreaCientifica::className(), 'targetAttribute' => ['area_cientifica_idArea' => 'idArea']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUc0' => Yii::t('app', 'Id Uc0'),
            'designacao' => Yii::t('app', 'Designação'),
            'area_cientifica_idArea' => Yii::t('app', 'Área Científica'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUcs()
    {
        return $this->hasMany(Uc::className(), ['uc_0' => 'idUc0']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUc1s()
    {
        return $this->hasMany(Uc1::className(), ['idUc1' => 'uc_1'])->viaTable('uc', ['uc_0' => 'idUc0']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaCientificaIdArea()
    {
        return $this->hasOne(AreaCientifica::className(), ['idArea' => 'area_cientifica_idArea']);
    }
}
