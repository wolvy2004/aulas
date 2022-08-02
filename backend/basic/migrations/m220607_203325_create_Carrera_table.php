<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Carrera}}`.
 */
class m220607_203325_create_Carrera_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%Carrera}}', [
            'id' => $this->primaryKey(),
            'descripcion'=> $this->string()->notNull(),
            'anios'=>$this->integer()->notNull()
            
        ]);
            
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%Carrera}}');
    }
}
