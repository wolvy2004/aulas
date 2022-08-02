<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Eventos}}`.
 */
class m220623_230606_create_Evento_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Evento}}', [
            'id' => $this->primaryKey(),
            'descripcion' => $this->string()->notNull(),
            'organismo' => $this->text()->notNull(),
            'organizador' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Evento}}');
    }
}
