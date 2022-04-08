<?php

use yii\db\Migration;

class m220408_103849_create_table_email_digest extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%email_digest}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'frequency' => $this->string(140)->notNull(),
                'recipient_list' => $this->text(),
                'model_names' => $this->string(140),
                'email_template' => $this->string(140)->notNull(),
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

        $this->createIndex('created_by', '{{%email_digest}}', ['created_by']);
        $this->createIndex('updated_by', '{{%email_digest}}', ['updated_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%email_digest}}');
    }
}
