<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Carrera_Materia".
 *
 * @property int $carrera_id
 * @property int $materia_id
 *
 * @property Carrera $carrera
 * @property Materia $materia
 */
class CarreraMateria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Carrera_Materia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carrera_id', 'materia_id'], 'required'],
            [['carrera_id', 'materia_id'], 'default', 'value' => null],
            [['carrera_id', 'materia_id'], 'integer'],
            [['carrera_id', 'materia_id'], 'unique', 'targetAttribute' => ['carrera_id', 'materia_id']],
            [['carrera_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['carrera_id' => 'id']],
            [['materia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['materia_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'carrera_id' => 'Carrera ID',
            'materia_id' => 'Materia ID',
        ];
    }

    /**
     * Gets query for [[Carrera]].
     *
     * @return \yii\db\ActiveQuery|CarreraQuery
     */
    public function getCarrera()
    {
        return $this->hasOne(Carrera::className(), ['id' => 'carrera_id']);
    }

    /**
     * Gets query for [[Materia]].
     *
     * @return \yii\db\ActiveQuery|MateriaQuery
     */
    public function getMateria()
    {
        return $this->hasOne(Materia::className(), ['id' => 'materia_id']);
    }

    /**
     * {@inheritdoc}
     * @return CarreraMateriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarreraMateriaQuery(get_called_class());
    }
}
