<?php

use yii\db\Migration;

class m221014_121954_create_table_crdl_Data_Import extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Data_Import}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'model_name' => $this->string(140)->notNull(),
                'import_type' => $this->string(140),
                'status' => $this->string(140),
                'import_file' => $this->string(140),
                'do_not_send_emails' => $this->boolean()->defaultValue('1'),
                'mapped_columns' => $this->text(),
                'errors_warnings' => $this->text(),
                'tags' => $this->text(),
                'comments' => $this->text(),
                'created_by' => $this->string(140),
                'created_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%Data_Import}}');
    }
}
