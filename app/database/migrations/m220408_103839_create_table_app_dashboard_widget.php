<?php

use yii\db\Migration;

class m220408_103839_create_table_app_dashboard_widget extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%app_dashboard_widget}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'route' => $this->string(140)->notNull(),
                'title' => $this->string(140)->notNull(),
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
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%app_dashboard_widget}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%app_dashboard_widget}}');
    }
}
