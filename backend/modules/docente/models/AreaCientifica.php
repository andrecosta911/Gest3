<?php

namespace backend\modules\docente\models;

use Yii;

/**
 * This is the model class for table "area_cientifica".
 *
 * @property integer $idArea
 * @property string $designacao
 *
 * @property Docente[] $docentes
 */
class AreaCientifica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'area_cientifica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idArea', 'designacao'], 'required'],
            [['idArea'], 'integer'],
            [['designacao'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idArea' => 'Id Area',
            'designacao' => 'Designacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocentes()
    {
        return $this->hasMany(Docente::className(), ['area_cientifica_idArea' => 'idArea']);
    }
}
