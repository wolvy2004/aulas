<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Carrera_Materia}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%carrera}}`
 * - `{{%materia}}`
 */
class m220630_215701_create_junction_table_for_carrera_and_materia_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Carrera_Materia}}', [
            'carrera_id' => $this->integer(),
            'materia_id' => $this->integer(),
            'PRIMARY KEY(carrera_id, materia_id)',
        ]);

        // creates index for column `carrera_id`
        $this->createIndex(
            '{{%idx-Carrera_Materia-carrera_id}}',
            '{{%Carrera_Materia}}',
            'carrera_id'
        );

        // add foreign key for table `{{%carrera}}`
        $this->addForeignKey(
            '{{%fk-Carrera_Materia-carrera_id}}',
            '{{%Carrera_Materia}}',
            'carrera_id',
            '{{%Carrera}}',
            'id',
            'CASCADE'
        );

        // creates index for column `materia_id`
        $this->createIndex(
            '{{%idx-Carrera_Materia-materia_id}}',
            '{{%Carrera_Materia}}',
            'materia_id'
        );

        // add foreign key for table `{{%materia}}`
        $this->addForeignKey(
            '{{%fk-Carrera_Materia-materia_id}}',
            '{{%Carrera_Materia}}',
            'materia_id',
            '{{%Materia}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%carrera}}`
        $this->dropForeignKey(
            '{{%fk-Carrera_Materia-carrera_id}}',
            '{{%Carrera_Materia}}'
        );

        // drops index for column `carrera_id`
        $this->dropIndex(
            '{{%idx-Carrera_Materia-carrera_id}}',
            '{{%Carrera_Materia}}'
        );

        // drops foreign key for table `{{%materia}}`
        $this->dropForeignKey(
            '{{%fk-Carrera_Materia-materia_id}}',
            '{{%Carrera_Materia}}'
        );

        // drops index for column `materia_id`
        $this->dropIndex(
            '{{%idx-Carrera_Materia-materia_id}}',
            '{{%Carrera_Materia}}'
        );

        $this->dropTable('{{%Carrera_Materia}}');
    }
}
