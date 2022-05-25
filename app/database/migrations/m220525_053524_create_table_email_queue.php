<?php

use yii\db\Migration;

class m220525_053524_create_table_email_queue extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%email_queue}}',
            [
                'id' => $this->primaryKey(10)->unsigned(),
                'status' => $this->string(20),
                'sent_at' => $this->dateTime(),
                'from' => $this->string(140)->notNull(),
                'to' => $this->string(140)->notNull(),
                'cc' => $this->text(),
                'subject' => $this->string(140)->notNull(),
                'message' => $this->text()->notNull(),
                'attachments' => $this->text(),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(20),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(20),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%email_queue}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%email_queue}}');
    }
}
