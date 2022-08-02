<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[MateriaProfesor]].
 *
 * @see MateriaProfesor
 */
class MateriaProfesorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return MateriaProfesor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return MateriaProfesor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
