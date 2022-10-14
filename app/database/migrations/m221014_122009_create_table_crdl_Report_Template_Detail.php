<?php

use yii\db\Migration;

class m221014_122009_create_table_crdl_Report_Template_Detail extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Report_Template_Detail}}',
            [
                'id' => $this->string(20)->notNull()->append('PRIMARY KEY'),
                'section' => $this->string(140)->notNull(),
                'template_id' => $this->string(140)->notNull(),
                'code_prefix' => $this->string(5),
                'alias' => $this->string(140),
                'description' => $this->text(),
                'level' => $this->integer(2)->defaultValue('0'),
                'limit' => $this->integer(2),
                'icon' => $this->string(140),
                'color' => $this->string(140),
                'hidden' => $this->boolean()->defaultValue('0'),
            ],
            $tableOptions
        );

        $this->createIndex('template_id_section', '{{%Report_Template_Detail}}', ['template_id', 'section'], true);
        $this->createIndex('template_id', '{{%Report_Template_Detail}}', ['template_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Report_Template_Detail}}');
    }
}
