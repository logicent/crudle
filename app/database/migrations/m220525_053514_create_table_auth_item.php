<?php

use yii\db\Migration;

class m220525_053514_create_table_auth_item extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%auth_item}}',
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
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('idx-auth_item-type', '{{%auth_item}}', ['type']);
        $this->createIndex('rule_name', '{{%auth_item}}', ['rule_name']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%auth_item}}');
    }
}
