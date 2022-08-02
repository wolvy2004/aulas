<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Profesor".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property int $materia_id
 *
 * @property Materia $materia
 * @property MateriaProfesor[] $materiaProfesors
 * @property Materia[] $materias
 */
class Profesor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Profesor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'materia_id'], 'required'],
            [['materia_id'], 'default', 'value' => null],
            [['materia_id'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 50],
            [['materia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['materia_id' => 'id']],
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
            'apellido' => 'Apellido',
            'materia_id' => 'Materia ID',
        ];
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
     * Gets query for [[MateriaProfesors]].
     *
     * @return \yii\db\ActiveQuery|MateriaProfesorQuery
     */
    public function getMateriaProfesors()
    {
        return $this->hasMany(MateriaProfesor::className(), ['profesor_id' => 'id']);
    }

    /**
     * Gets query for [[Materias]].
     *
     * @return \yii\db\ActiveQuery|MateriaQuery
     */
    public function getMaterias()
    {
        return $this->hasMany(Materia::className(), ['id' => 'materia_id'])->viaTable('Materia_Profesor', ['profesor_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProfesorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProfesorQuery(get_called_class());
    }
}
