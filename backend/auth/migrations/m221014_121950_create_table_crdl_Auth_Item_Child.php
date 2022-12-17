<?php

use yii\db\Migration;

class m221014_121950_create_table_crdl_Auth_Item_Child extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Auth_Item_Child}}',
            [
                'parent' => $this->string(64)->notNull(),
                'child' => $this->string(64)->notNull(),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%Auth_Item_Child}}', ['parent', 'child']);

        $this->createIndex('child', '{{%Auth_Item_Child}}', ['child']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Auth_Item_Child}}');
    }
}
