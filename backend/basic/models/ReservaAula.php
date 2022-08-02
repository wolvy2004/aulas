<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reservaAula".
 *
 * @property int $id
 * @property int|null $evento_id
 * @property int $aula_id
 * @property string $fh_desde
 * @property string $fh_hasta
 *
 * @property Aula $aula
 */
class ReservaAula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservaAula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evento_id', 'aula_id'], 'default', 'value' => null],
            [['evento_id', 'aula_id'], 'integer'],
            [['aula_id', 'fh_desde', 'fh_hasta'], 'required'],
            [['fh_desde', 'fh_hasta'], 'safe'],
            [['aula_id'], 'unique'],
            [['fh_desde'], 'unique'],
            [['fh_hasta'], 'unique'],
            [['aula_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aula::className(), 'targetAttribute' => ['aula_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'evento_id' => 'Evento ID',
            'aula_id' => 'Aula ID',
            'fh_desde' => 'Fh Desde',
            'fh_hasta' => 'Fh Hasta',
        ];
    }

    /**
     * Gets query for [[Aula]].
     *
     * @return \yii\db\ActiveQuery|AulaQuery
     */
    public function getAula()
    {
        return $this->hasOne(Aula::className(), ['id' => 'aula_id']);
    }

    /**
     * {@inheritdoc}
     * @return ReservaAulaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReservaAulaQuery(get_called_class());
    }
}
