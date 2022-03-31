<?php

use yii\db\Migration;

class m220331_141132_create_table_auth extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%auth}}',
            [
                'id' => $this->string(20)->notNull()->append('PRIMARY KEY'),
                'username' => $this->string(140)->notNull(),
                'auth_key' => $this->string(32)->notNull(),
                'password_hash' => $this->string()->notNull(),
                'password_reset_token' => $this->string(),
                'email' => $this->string(140)->notNull(),
                'status' => $this->boolean()->notNull()->defaultValue('1'),
                'created_at' => $this->dateTime()->notNull(),
                'created_by' => $this->string(20),
                'updated_at' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
                'updated_by' => $this->string(20),
            ],
            $tableOptions
        );

        $this->createIndex('email', '{{%auth}}', ['email'], true);
        $this->createIndex('updated_by', '{{%auth}}', ['updated_by']);
        $this->createIndex('username', '{{%auth}}', ['username'], true);
        $this->createIndex('password_reset_token', '{{%auth}}', ['password_reset_token'], true);
        $this->createIndex('created_by', '{{%auth}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%auth}}');
    }
}
