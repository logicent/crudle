<?php

use yii\db\Migration;

class m220408_103908_create_table_user_group extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user_group}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'alias' => $this->string(140),
                'group_email' => $this->string(140),
                'status' => $this->string(140),
                'notes' => $this->text(),
                'user_role' => $this->string(140),
                'parent_group' => $this->string(140),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%user_group}}', ['created_by']);
        $this->createIndex('updated_by', '{{%user_group}}', ['updated_by']);
        $this->createIndex('user_group', '{{%user_group}}', ['parent_group']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user_group}}');
    }
}
