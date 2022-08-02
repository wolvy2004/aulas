<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Profesor}}`.
 */
class m220608_010836_create_Profesor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Profesor}}', [
            'id' => $this->primaryKey(),
            'nombre'=> $this->string(50)->notNull(),
            'apellido'=> $this->string(50) ->notNull(),
            'materia_id'=>$this->integer()->notNull()
        ]);
        $this->createIndex(
            'fk_materia_id',
            'Profesor',
            'materia_id'
        );
        $this->addForeignKey(
            'fk_Profesor_materia_id',
            'Profesor',
            'materia_id',
            'Materia',
            'id',
            'SET NULL'

        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Profesor}}');
    }
}
