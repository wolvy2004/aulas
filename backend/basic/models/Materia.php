<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Materia".
 *
 * @property int $id
 * @property string|null $nombre
 * @property int $carrera_id
 * @property string $anio
 *
 * @property Carrera $carrera
 * @property CarreraMateria[] $carreraMaterias
 * @property Carrera[] $carreras
 * @property MateriaProfesor[] $materiaProfesors
 * @property Profesor[] $profesors
 * @property Profesor[] $profesors0
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Materia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string'],
            [['carrera_id', 'anio'], 'required'],
            [['carrera_id'], 'default', 'value' => null],
            [['carrera_id'], 'integer'],
            [['anio'], 'string', 'max' => 10],
            [['carrera_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['carrera_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'carrera_id' => 'Carrera ID',
            'anio' => 'Anio',
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
     * Gets query for [[CarreraMaterias]].
     *
     * @return \yii\db\ActiveQuery|CarreraMateriaQuery
     */
    public function getCarreraMaterias()
    {
        return $this->hasMany(CarreraMateria::className(), ['materia_id' => 'id']);
    }

    /**
     * Gets query for [[Carreras]].
     *
     * @return \yii\db\ActiveQuery|CarreraQuery
     */
    public function getCarreras()
    {
        return $this->hasMany(Carrera::className(), ['id' => 'carrera_id'])->viaTable('Carrera_Materia', ['materia_id' => 'id']);
    }

    /**
     * Gets query for [[MateriaProfesors]].
     *
     * @return \yii\db\ActiveQuery|MateriaProfesorQuery
     */
    public function getMateriaProfesors()
    {
        return $this->hasMany(MateriaProfesor::className(), ['materia_id' => 'id']);
    }

    /**
     * Gets query for [[Profesors]].
     *
     * @return \yii\db\ActiveQuery|MateriaQuery
     */
    public function getProfesors()
    {
        return $this->hasMany(Profesor::className(), ['materia_id' => 'id']);
    }

    /**
     * Gets query for [[Profesors0]].
     *
     * @return \yii\db\ActiveQuery|MateriaQuery
     */
    public function getProfesors0()
    {
        return $this->hasMany(Profesor::className(), ['id' => 'profesor_id'])->viaTable('Materia_Profesor', ['materia_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return MateriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MateriaQuery(get_called_class());
    }
}
