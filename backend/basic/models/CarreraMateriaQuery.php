<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CarreraMateria]].
 *
 * @see CarreraMateria
 */
class CarreraMateriaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CarreraMateria[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CarreraMateria|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
