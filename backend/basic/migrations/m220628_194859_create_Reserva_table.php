<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Reserva}}`.
 */
class m220628_194859_create_Reserva_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Reserva}}', [
            'id' => $this->primaryKey(),
            'evento'=>$this->integer()-> notNull(),
            'fecha_desde'=>$this->date()->notNull(),
            'fecha_hasta'=>$this->date()->notNull(), 
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Reserva}}');
    }
}
