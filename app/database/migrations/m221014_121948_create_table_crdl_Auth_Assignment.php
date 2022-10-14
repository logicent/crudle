<?php

use yii\db\Migration;

class m221014_121948_create_table_crdl_Auth_Assignment extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Auth_Assignment}}',
            [
                'item_name' => $this->string(64)->notNull(),
                'user_id' => $this->string(64)->notNull(),
                'created_at' => $this->integer(),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%Auth_Assignment}}', ['item_name', 'user_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Auth_Assignment}}');
    }
}
