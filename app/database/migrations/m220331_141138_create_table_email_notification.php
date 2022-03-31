<?php

use yii\db\Migration;

class m220331_141138_create_table_email_notification extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%email_notification}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'data_model' => $this->string(140)->notNull(),
                'from_address_field' => $this->string(140)->notNull(),
                'to_address_field' => $this->string(140)->notNull(),
                'cc_recipients_field' => $this->text(),
                'notify_if_status' => $this->string(140),
                'other_cc_recipients' => $this->text(),
                'other_cc_paused' => $this->boolean(),
                'other_cc_if_statuses' => $this->text(),
                'email_template' => $this->string(140),
                'inactive' => $this->boolean(),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('updated_by', '{{%email_notification}}', ['updated_by']);
        $this->createIndex('created_by', '{{%email_notification}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%email_notification}}');
    }
}
