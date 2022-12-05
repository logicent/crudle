<?php

use yii\db\Migration;

class m221014_122000_create_table_crdl_Email_Notification extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Email_Notification}}',
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
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%Email_Notification}}', ['created_by']);
        $this->createIndex('updated_by', '{{%Email_Notification}}', ['updated_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Email_Notification}}');
    }
}
