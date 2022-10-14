<?php

use yii\db\Migration;

class m221014_121949_create_table_crdl_Auth_Item extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Auth_Item}}',
            [
                'name' => $this->string(64)->notNull()->append('PRIMARY KEY'),
                'type' => $this->smallInteger()->notNull(),
                'description' => $this->text(),
                'rule_name' => $this->string(64),
                'data' => $this->binary(),
                'inactive' => $this->string(140),
                'comments' => $this->text(),
                'created_at' => $this->integer(),
                'created_by' => $this->string(140),
                'updated_at' => $this->integer(),
                'updated_by' => $this->string(140),
            ],
            $tableOptions
        );

        $this->createIndex('rule_name', '{{%Auth_Item}}', ['rule_name']);
        $this->createIndex('idx-auth_item-type', '{{%Auth_Item}}', ['type']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Auth_Item}}');
    }
}
