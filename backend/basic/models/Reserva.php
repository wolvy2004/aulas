<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Reserva".
 *
 * @property int $id
 * @property int $evento
 * @property string $fecha_desde
 * @property string $fecha_hasta
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evento', 'fecha_desde', 'fecha_hasta'], 'required'],
            [['evento'], 'default', 'value' => null],
            [['evento'], 'integer'],
            [['fecha_desde', 'fecha_hasta'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'evento' => 'Evento',
            'fecha_desde' => 'Fecha Desde',
            'fecha_hasta' => 'Fecha Hasta',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ReservaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ReservaQuery(get_called_class());
    }
}
