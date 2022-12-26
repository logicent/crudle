<?php

use yii\db\Migration;

class m221014_122008_create_table_crdl_Report_Template extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Report_Template}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'organization_id' => $this->string(140),
                'type' => $this->string(140),
                'description' => $this->text(),
                'alias' => $this->string(140),
                'inactive' => $this->boolean()->defaultValue('0'),
                'comments' => $this->text(),
                'tags' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
            ],
            $tableOptions
        );

        $this->createIndex('updated_by', '{{%Report_Template}}', ['updated_by']);
        $this->createIndex('organization_id', '{{%Report_Template}}', ['organization_id']);
        $this->createIndex('created_by', '{{%Report_Template}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Report_Template}}');
    }
}
