<?php

use yii\db\Migration;

class m221014_122020_create_table_crdl_User_Group extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%User_Group}}',
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
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%User_Group}}', ['created_by']);
        $this->createIndex('user_group', '{{%User_Group}}', ['parent_group']);
        $this->createIndex('updated_by', '{{%User_Group}}', ['updated_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%User_Group}}');
    }
}
