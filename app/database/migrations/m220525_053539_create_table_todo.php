<?php

use yii\db\Migration;

class m220525_053539_create_table_todo extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%todo}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'name' => $this->string(140)->notNull(),
                'description' => $this->string(140),
                'status' => $this->string(140),
                'inactive' => $this->boolean(),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%todo}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%todo}}');
    }
}
