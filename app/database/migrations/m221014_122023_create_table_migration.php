<?php

use yii\db\Migration;

class m221014_122023_create_table_migration extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%migration}}',
            [
                'version' => $this->string(180)->notNull()->append('PRIMARY KEY'),
                'apply_time' => $this->integer(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%migration}}');
    }
}
