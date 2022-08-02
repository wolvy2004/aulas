<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Materia_Profesor".
 *
 * @property int $materia_id
 * @property int $profesor_id
 *
 * @property Materia $materia
 * @property Profesor $profesor
 */
class MateriaProfesor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Materia_Profesor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['materia_id', 'profesor_id'], 'required'],
            [['materia_id', 'profesor_id'], 'default', 'value' => null],
            [['materia_id', 'profesor_id'], 'integer'],
            [['materia_id', 'profesor_id'], 'unique', 'targetAttribute' => ['materia_id', 'profesor_id']],
            [['materia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['materia_id' => 'id']],
            [['profesor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::className(), 'targetAttribute' => ['profesor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'materia_id' => 'Materia ID',
            'profesor_id' => 'Profesor ID',
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
     * Gets query for [[Profesor]].
     *
     * @return \yii\db\ActiveQuery|MateriaQuery
     */
    public function getProfesor()
    {
        return $this->hasOne(Profesor::className(), ['id' => 'profesor_id']);
    }

    /**
     * {@inheritdoc}
     * @return MateriaProfesorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MateriaProfesorQuery(get_called_class());
    }
}
