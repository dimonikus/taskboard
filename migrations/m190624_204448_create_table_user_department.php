<?php

use yii\db\Migration;

/**
 * Class m190624_204448_create_table_user_department
 */
class m190624_204448_create_table_user_department extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_department',
            [
                'id' => $this->primaryKey(),
                'department' => $this->string(32)->notNull()->defaultValue('')->comment('Отдел'),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_department');
    }
}
