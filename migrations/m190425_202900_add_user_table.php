<?php

use yii\db\Migration;

/**
 * Class m190425_202900_add_user_table
 */
class m190425_202900_add_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user',
            [
                'id' => $this->primaryKey(),
                'first_name' => $this->string(16)->notNull()->defaultValue('')->comment('Имя'),
                'last_name' => $this->string(16)->notNull()->defaultValue('')->comment('Фамилия'),
                'email' => $this->string(32)->notNull()->defaultValue('')->comment('Email'),
                'password' => $this->string(64)->defaultValue(null)->comment('Пароль'),
                'date_entered' => 'DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT "Дата создания"',
                'date_modified' => 'DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT "Дата редактирования"',
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
