<?php

use yii\db\Migration;

class m220331_141142_create_table_print_format extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%print_format}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'created_by' => $this->string(140),
                'default_print_language' => $this->string(140),
                'status' => $this->string(140),
                'inactive' => $this->boolean()->defaultValue('0'),
                'custom_format' => $this->boolean(),
                'model_name' => $this->string(140)->notNull(),
                'module' => $this->string(140)->notNull(),
                'custom_css' => $this->text(),
                'comments' => $this->text(),
                'tags' => $this->text(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%print_format}}');
    }
}
