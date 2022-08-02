<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Aulas}}`.
 */
class m220607_185706_create_Aula_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("Aula", [
            'id' => $this->primaryKey(),
            'descripciom'=>$this->string(100)->notNull()->unique(),
            'cant_pcs' => $this->integer(2),
            'es_climatizada' => $this->boolean(),
            'aforo' => $this->boolean(),
            'Location_id' => $this->integer()->notNull()
        ]);

        $this->createIndex(
            'fk_Location_id',
            'Aula',
            'Location_id'
        );
        $this->addForeignKey(
            'fk_aula_Location_id',
            'Aula',
            'Location_id',
            'Location',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Aula');
    }
}
