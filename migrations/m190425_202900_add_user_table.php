<?php

use yii\db\Migration;
use \app\models\User;

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
                'avatar' => $this->string(16)->defaultValue(null)->comment('Фото'),
                'date_entered' => 'DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT "Дата создания"',
                'date_modified' => 'DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT "Дата редактирования"',
            ]
        );

        $admin = new User(['scenario' => User::SCENARIO_CREATE]);
        $admin->password = 'admin';
        $admin->email = 'admin@admin.com';
        $admin->first_name = 'admin';
        $admin->last_name = 'admin';
        $admin->save();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
