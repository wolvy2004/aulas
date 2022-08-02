<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Materia}}`.
 */
class m220608_010451_create_Materia_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Materia}}', [
            'id' => $this->primaryKey(),
            'nombre'=> $this->text(100),
            'carrera_id'=> $this->integer()->notNull(),
            'anio'=>$this->string(10)->notNull()
        ]);

        $this->createIndex(
            'fk_carrera_id',
            'Materia',
            'carrera_id'
        );
        $this->addForeignKey(
            'fk_Materia_carrera_id',
            'Materia',
            'carrera_id',
            'Carrera',
            'id',
            'cascade'
        );
    }
    

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Materia}}');
    }
}
