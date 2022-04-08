<?php

use yii\db\Migration;

class m220408_103841_create_table_app_data_model_field extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%app_data_model_field}}',
            [
                'name' => $this->string(140)->notNull(),
                'data_model' => $this->string(140)->notNull(),
                'label' => $this->string(140),
                'length' => $this->integer(),
                'type' => $this->string(140),
                'options' => $this->text(),
                'mandatory' => $this->boolean()->defaultValue('0'),
                'unique' => $this->boolean()->defaultValue('0'),
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
                'perm_level' => $this->integer()->defaultValue('0'),
                'hidden' => $this->boolean(),
                'readonly' => $this->boolean(),
                'mandatory_depends_on' => $this->string(140),
                'readonly_depends_on' => $this->string(140),
                'default' => $this->string(140)->defaultValue(''),
                'description' => $this->string(140),
                'in_filter' => $this->boolean(),
                'print_hide' => $this->boolean(),
                'print_width' => $this->integer(),
                'width' => $this->integer(),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%app_data_model_field}}', ['name', 'data_model']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%app_data_model_field}}');
    }
}
