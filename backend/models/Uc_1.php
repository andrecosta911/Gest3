<?php

namespace backend\models;
use backend\modules\docente\models\AreaCientifica;

use Yii;

/**
 * This is the model class for table "uc_1".
 *
 * @property integer $idUc1
 * @property string $designacao
 * @property integer $area_cientifica_idArea
 *
 * @property Uc[] $ucs
 * @property Uc0[] $uc0s
 * @property AreaCientifica $areaCientificaIdArea
 */
class Uc_1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uc_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idUc1', 'designacao'], 'required', 'message' => 'O preenchimento deste campo é obrigatório'],
            [['idUc1', 'area_cientifica_idArea'], 'integer', 'message' => 'O conteúdo deste campo não é válido'],
            [['designacao'], 'string', 'max' => 45],
            [['idUc1'], 'unique', 'message' => 'Este código já se encontra atribuído'],
            [['area_cientifica_idArea'], 'exist', 'skipOnError' => true, 'targetClass' => AreaCientifica::className(), 'targetAttribute' => ['area_cientifica_idArea' => 'idArea']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idUc1' => Yii::t('app', 'Id Uc1'),
            'designacao' => Yii::t('app', 'Designação'),
            'area_cientifica_idArea' => Yii::t('app', 'Área Científica'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUcs()
    {
        return $this->hasMany(Uc::className(), ['uc_1' => 'idUc1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUc0s()
    {
        return $this->hasMany(Uc0::className(), ['idUc0' => 'uc_0'])->viaTable('uc', ['uc_1' => 'idUc1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAreaCientificaIdArea()
    {
        return $this->hasOne(AreaCientifica::className(), ['idArea' => 'area_cientifica_idArea']);
    }
}
