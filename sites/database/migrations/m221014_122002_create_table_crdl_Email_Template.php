<?php

use yii\db\Migration;

class m221014_122002_create_table_crdl_Email_Template extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Email_Template}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'subject' => $this->text(),
                'message' => $this->text(),
                'inactive' => $this->boolean(),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%Email_Template}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Email_Template}}');
    }
}
