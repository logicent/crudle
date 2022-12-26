<?php

use yii\db\Migration;

class m221014_122007_create_table_crdl_Report_Query_Item extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Report_Query_Item}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'query_id' => $this->string(140),
                'attribute_name' => $this->string(140),
                'default_value' => $this->string(140),
                'sort_by' => $this->boolean(),
                'sort_order' => $this->string(20),
                'filter_by' => $this->boolean(),
                'hidden' => $this->boolean()->defaultValue('0'),
                'select_function' => $this->text(),
                'select_expression' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%Report_Query_Item}}');
    }
}
