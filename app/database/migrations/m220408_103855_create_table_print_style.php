<?php

use yii\db\Migration;

class m220408_103855_create_table_print_style extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%print_style}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'created_by' => $this->string(140),
                'css' => $this->text(),
                'status' => $this->string(140),
                'inactive' => $this->boolean()->defaultValue('0'),
                'standard' => $this->boolean(),
                'preview' => $this->string(140)->notNull(),
                'comments' => $this->text(),
                'tags' => $this->text(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%print_style}}');
    }
}
