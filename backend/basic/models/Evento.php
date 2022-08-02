<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Evento".
 *
 * @property int $id
 * @property string $descripcion
 * @property string $organismo
 * @property string $organizador
 */
class Evento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Evento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'organismo', 'organizador'], 'required'],
            [['organismo', 'organizador'], 'string'],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'organismo' => 'Organismo',
            'organizador' => 'Organizador',
        ];
    }

    /**
     * {@inheritdoc}
     * @return EventoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EventoQuery(get_called_class());
    }
}
