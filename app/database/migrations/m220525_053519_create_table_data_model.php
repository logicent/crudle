<?php

use yii\db\Migration;

class m220525_053519_create_table_data_model extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%data_model}}',
            [
                'id' => $this->string(140)->notNull(),
                'name' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'module' => $this->string(140)->notNull(),
                'title_field' => $this->string(140),
                'status' => $this->string(140),
                'image_field' => $this->string(140),
                'max_attachments' => $this->integer()->defaultValue('0'),
                'hide_copy' => $this->boolean(),
                'is_table' => $this->boolean(),
                'quick_entry' => $this->boolean(),
                'track_changes' => $this->boolean(),
                'track_views' => $this->boolean(),
                'allow_auto_repeat' => $this->boolean(),
                'allow_import' => $this->boolean(),
                'search_fields' => $this->text(),
                'sort_field' => $this->string(140),
                'sort_order' => $this->string(140),
                'comments' => $this->text(),
                'created_by' => $this->string(140),
                'updated_by' => $this->string(140),
                'created_at' => $this->dateTime(),
                'updated_at' => $this->dateTime(),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%data_model}}');
    }
}
