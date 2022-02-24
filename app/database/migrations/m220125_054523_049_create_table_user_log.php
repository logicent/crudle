<?php

use yii\db\Migration;

class m220125_054523_049_create_table_user_log extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user_log}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'auth_id' => $this->string(140)->notNull(),
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
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%user_log}}', ['created_by']);
        $this->createIndex('auth_id', '{{%user_log}}', ['auth_id']);
        $this->createIndex('updated_by', '{{%user_log}}', ['updated_by']);
    }

    public function down()
    {
        $this->dropTable('{{%user_log}}');
    }
}
