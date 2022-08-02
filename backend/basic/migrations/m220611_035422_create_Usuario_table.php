<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%Usuario}}`.
 */
class m220611_035422_create_usuario_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%usuario}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(50),
            'nombre' => $this->string(50),
            'apellido' => $this->string(50),
            'email' => $this->string(50),
            'password' => $this->text(255),
            'auth_key_token' => $this->text(255)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%usuario}}');
    }
}
