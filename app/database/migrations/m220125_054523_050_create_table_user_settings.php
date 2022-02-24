<?php

use yii\db\Migration;

class m220125_054523_050_create_table_user_settings extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%user_settings}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'auth_id' => $this->string(140)->notNull(),
                'view_model' => $this->string(140),
                'view_settings' => $this->text(),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%user_settings}}', ['created_by']);
        $this->createIndex('auth_id', '{{%user_settings}}', ['auth_id']);
        $this->createIndex('updated_by', '{{%user_settings}}', ['updated_by']);
    }

    public function down()
    {
        $this->dropTable('{{%user_settings}}');
    }
}
