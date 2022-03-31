<?php

use yii\db\Migration;

class m220331_141155_create_table_user_log extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user_log}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'user_id' => $this->string(140)->notNull(),
                'session_id' => $this->string(140),
                'status' => $this->string(140),
                'login_at' => $this->integer(),
                'login_ip' => $this->string(128),
                'logout_at' => $this->integer(),
                'logout_ip' => $this->string(128),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('user_id', '{{%user_log}}', ['user_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user_log}}');
    }
}
