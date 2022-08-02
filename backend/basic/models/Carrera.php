<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Carrera".
 *
 * @property int $id
 * @property string $descripcion
 * @property int $anios
 *
 * @property CarreraMateria[] $carreraMaterias
 * @property Materia[] $materias
 * @property Materia[] $materias0
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Carrera';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'anios'], 'required'],
            [['anios'], 'default', 'value' => null],
            [['anios'], 'integer'],
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
            'anios' => 'Anios',
        ];
    }

    /**
     * Gets query for [[CarreraMaterias]].
     *
     * @return \yii\db\ActiveQuery|CarreraMateriaQuery
     */
    public function getCarreraMaterias()
    {
        return $this->hasMany(CarreraMateria::className(), ['carrera_id' => 'id']);
    }

    /**
     * Gets query for [[Materias]].
     *
     * @return \yii\db\ActiveQuery|MateriaQuery
     */
    public function getMaterias()
    {
        return $this->hasMany(Materia::className(), ['carrera_id' => 'id']);
    }

    /**
     * Gets query for [[Materias0]].
     *
     * @return \yii\db\ActiveQuery|MateriaQuery
     */
    public function getMaterias0()
    {
        return $this->hasMany(Materia::className(), ['id' => 'materia_id'])->viaTable('Carrera_Materia', ['carrera_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return CarreraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CarreraQuery(get_called_class());
    }
}
