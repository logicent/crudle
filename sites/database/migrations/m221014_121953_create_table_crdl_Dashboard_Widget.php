<?php

use yii\db\Migration;

class m221014_121953_create_table_crdl_Dashboard_Widget extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Dashboard_Widget}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'dashboard_id' => $this->string(140)->notNull(),
                'title' => $this->string(140),
                'group' => $this->string(140),
                'type' => $this->string(140),
                'data_model' => $this->string(140),
                'data_aggregate_function' => $this->string(140),
                'group_by_column' => $this->string(140),
                'show_filtered_data' => $this->string(140),
                'column_width' => $this->string(140),
                'status' => $this->boolean(),
                'icon' => $this->string(140),
                'icon_path' => $this->string(140),
                'icon_color' => $this->string(140),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%Dashboard_Widget}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Dashboard_Widget}}');
    }
}
