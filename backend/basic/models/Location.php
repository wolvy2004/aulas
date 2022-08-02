<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Location".
 *
 * @property int $id
 * @property string $descripcion
 *
 * @property Aula[] $aulas
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
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
        ];
    }

    /**
     * Gets query for [[Aulas]].
     *
     * @return \yii\db\ActiveQuery|AulaQuery
     */
    public function getAulas()
    {
        return $this->hasMany(Aula::className(), ['Location_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return LocationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LocationQuery(get_called_class());
    }
}
