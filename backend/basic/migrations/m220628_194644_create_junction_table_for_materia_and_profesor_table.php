    <?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Materia_Profesor}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%materia}}`
 * - `{{%profesor}}`
 */
class m220628_194644_create_junction_table_for_materia_and_profesor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Materia_Profesor}}', [
            'materia_id' => $this->integer(),
            'profesor_id' => $this->integer(),
            'PRIMARY KEY(materia_id, profesor_id)',
        ]);

        // creates index for column `materia_id`
        $this->createIndex(
            '{{%idx-materia_profesor-materia_id}}',
            '{{%Materia_Profesor}}',
            'materia_id'
        );

        // add foreign key for table `{{%materia}}`
        $this->addForeignKey(
            '{{%fk-materia_profesor-materia_id}}',
            '{{%Materia_Profesor}}',
            'materia_id',
            '{{%Materia}}',
            'id',
            'SET NULL'
        );

        // creates index for column `profesor_id`
        $this->createIndex(
            '{{%idx-materia_profesor-profesor_id}}',
            '{{%Materia_Profesor}}',
            'profesor_id'
        );

        // add foreign key for table `{{%profesor}}`
        $this->addForeignKey(
            '{{%fk-materia_profesor-profesor_id}}',
            '{{%Materia_Profesor}}',
            'profesor_id',
            '{{%Profesor}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%materia}}`
        $this->dropForeignKey(
            '{{%fk-materia_profesor-materia_id}}',
            '{{%Materia_Profesor}}'
        );

        // drops index for column `materia_id`
        $this->dropIndex(
            '{{%idx-materia_profesor-materia_id}}',
            '{{%Materia_Profesor}}'
        );

        // drops foreign key for table `{{%profesor}}`
        $this->dropForeignKey(
            '{{%fk-materia_profesor-profesor_id}}',
            '{{%Materia_Profesor}}'
        );

        // drops index for column `profesor_id`
        $this->dropIndex(
            '{{%idx-materia_profesor-profesor_id}}',
            '{{%Materia_Profesor}}'
        );

        $this->dropTable('{{%Materia_Profesor}}');
    }
}
