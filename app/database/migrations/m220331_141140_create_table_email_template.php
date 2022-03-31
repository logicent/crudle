<?php

use yii\db\Migration;

class m220331_141140_create_table_email_template extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%email_template}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'subject' => $this->text(),
                'message' => $this->text(),
                'inactive' => $this->boolean(),
                'comments' => $this->text(),
                'created_at' => $this->dateTime()->notNull(),
                'created_by' => $this->string(140)->notNull(),
                'updated_at' => $this->dateTime()->notNull(),
                'updated_by' => $this->string(140)->notNull(),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%email_template}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%email_template}}');
    }
}
