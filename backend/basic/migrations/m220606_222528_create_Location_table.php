<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Location}}`.
 */
class m220606_222528_create_Location_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Location}}', [
            'id' => $this->primaryKey(),
            'descripcion'=> $this->string()->notNull()]);
           
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Location}}');
    }
}
