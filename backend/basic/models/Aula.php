<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Aula".
 *
 * @property int $id
 * @property int|null $cant_pcs
 * @property bool|null $es_climatizada
 * @property bool|null $aforo
 * @property int $Location_id
 *
 * @property Location $location
 * @property ReservaAula $reservaAula
 */
class Aula extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Aula';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cant_pcs', 'Location_id'], 'default', 'value' => null],
            [['cant_pcs', 'Location_id'], 'integer'],
            [['descripcion'], 'required'],
            [['es_climatizada', 'aforo'], 'boolean'],
            [['Location_id'], 'required'],
            [['Location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['Location_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'descripcion',
            'cant_pcs' => 'Cant Pcs',
            'es_climatizada' => 'Es Climatizada',
            'aforo' => 'Aforo',
            'Location_id' => 'Location ID',
        ];
    }

    /**
     * Gets query for [[Location]].
     *
     * @return \yii\db\ActiveQuery|LocationQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'Location_id']);
    }

    /**
     * Gets query for [[ReservaAula]].
     *
     * @return \yii\db\ActiveQuery|ReservaAulaQuery
     */
    public function getReservaAula()
    {
        return $this->hasOne(ReservaAula::className(), ['aula_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AulaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AulaQuery(get_called_class());
    }
}
