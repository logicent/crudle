<?php

use yii\db\Migration;

class m221014_121956_create_table_crdl_Data_Model_Field extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Data_Model_Field}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'label' => $this->string(140),
                'model_name' => $this->string(140)->notNull(),
                'field_name' => $this->string(140)->notNull(),
                'field_type' => $this->string(140),
                'db_type' => $this->string(140),
                'mandatory' => $this->boolean()->defaultValue('0'),
                'unique' => $this->boolean()->defaultValue('0'),
                'length' => $this->integer(6),
                'options' => $this->text(),
                'col_index' => $this->smallInteger(4),
                'col_side' => $this->char(3),
                'in_list_view' => $this->boolean(),
                'in_standard_filter' => $this->boolean(),
                'in_global_search' => $this->boolean(),
                'bold' => $this->boolean(),
                'allow_in_quick_entry' => $this->boolean(),
                'translatable' => $this->boolean(),
                'fetch_from' => $this->boolean(),
                'fetch_if_empty' => $this->boolean(),
                'depends_on' => $this->string(140),
                'ignore_user_permissions' => $this->boolean(),
                'allow_on_submit' => $this->boolean()->defaultValue('1'),
                'report_hide' => $this->boolean(),
                'perm_level' => $this->integer(6)->defaultValue('0'),
                'hidden' => $this->boolean(),
                'readonly' => $this->boolean(),
                'mandatory_depends_on' => $this->string(140),
                'readonly_depends_on' => $this->string(140),
                'default' => $this->string(140)->defaultValue(''),
                'description' => $this->string(140),
                'in_filter' => $this->boolean(),
                'print_hide' => $this->boolean(),
                'print_width' => $this->integer(6),
                'width' => $this->integer(6),
            ],
            $tableOptions
        );

        $this->createIndex('data_model_name', '{{%Data_Model_Field}}', ['model_name', 'field_name'], true);
        $this->createIndex('data_model', '{{%Data_Model_Field}}', ['model_name']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Data_Model_Field}}');
    }
}
