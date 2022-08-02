<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reserva_aula}}`.
 */
class m220608_010942_create_reservaAula_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reservaAula}}', [
            'id' => $this->primaryKey(),
            'evento_id'=>$this->integer(4),
            'aula_id'=>$this->integer()->notNull()->unique(),
            'fh_desde'=>$this->date()->notNull()->unique(),
            'fh_hasta'=>$this->date()->notNull()->unique()
        ]);

        $this->createIndex(
            'fk_id_aula',
            'reservaAula',
            'aula_id'
        );
        $this->addForeignKey(
            'fk_reservaAula_id_aula',
            'reservaAula',
            'aula_id',
            'Aula',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%reservaAula}}');
    }
}
