<?php

namespace backend\models;

use Yii;
use backend\models\Uc_0;
use backend\models\Uc_1;

/**
 * This is the model class for table "uc".
 *
 * @property integer $uc_1
 * @property integer $uc_0
 *
 * @property Oferta[] $ofertas
 * @property ProgramaDoutoral[] $programaDoutorals
 * @property Uc0 $uc0
 * @property Uc1 $uc1
 */
class Uc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uc_1', 'uc_0'], 'required'],
            [['uc_1', 'uc_0'], 'integer'],
            [['uc_0'], 'exist', 'skipOnError' => true, 'targetClass' => Uc_0::className(), 'targetAttribute' => ['uc_0' => 'idUc0']],
            [['uc_1'], 'exist', 'skipOnError' => true, 'targetClass' => Uc_1::className(), 'targetAttribute' => ['uc_1' => 'idUc1']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uc_1' => Yii::t('app', 'Uc 1'),
            'uc_0' => Yii::t('app', 'Uc 0'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertas()
    {
        return $this->hasMany(Oferta::className(), ['uc_uc_1' => 'uc_1', 'uc_uc_0' => 'uc_0']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramaDoutorals()
    {
        return $this->hasMany(ProgramaDoutoral::className(), ['idPrograma' => 'programa_doutoral'])->viaTable('oferta', ['uc_uc_1' => 'uc_1', 'uc_uc_0' => 'uc_0']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUc0()
    {
        return $this->hasOne(Uc_0::className(), ['idUc0' => 'uc_0']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUc1()
    {
        return $this->hasOne(Uc_1::className(), ['idUc1' => 'uc_1']);
    }
}
