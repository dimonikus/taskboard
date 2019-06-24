<?php

use yii\db\Migration;

/**
 * Class m190624_203510_add_table_user_position
 */
class m190624_203510_add_table_user_position extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_position',
            [
                'id' => $this->primaryKey(),
                'position' => $this->string(32)->notNull()->defaultValue('')->comment('Должность'),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_position');
    }
}
