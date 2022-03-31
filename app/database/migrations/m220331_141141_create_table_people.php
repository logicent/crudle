<?php

use yii\db\Migration;

class m220331_141141_create_table_people extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%people}}',
            [
                'auth_id' => $this->string(20)->notNull(),
                'username' => $this->string(140)->notNull(),
                'email' => $this->string(140)->notNull(),
                'auth_status' => $this->boolean()->notNull()->defaultValue('1'),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue('0000-00-00 00:00:00'),
                'user_id' => $this->string(140),
                'firstname' => $this->string(140),
                'surname' => $this->string(140),
                'sex' => $this->char(),
                'mobile_no' => $this->string(140),
                'avatar' => $this->string(140),
                'user_status' => $this->string(140),
                'comments' => $this->text(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%people}}');
    }
}
