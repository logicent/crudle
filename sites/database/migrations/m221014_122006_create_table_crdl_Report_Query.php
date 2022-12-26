<?php

use yii\db\Migration;

class m221014_122006_create_table_crdl_Report_Query extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Report_Query}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'route' => $this->string(140),
                'title' => $this->string(140)->notNull(),
                'subtitle' => $this->string(140),
                'description' => $this->text(),
                'model_name' => $this->string(140),
                'group' => $this->string(140),
                'type' => $this->string(140),
                'inactive' => $this->boolean()->defaultValue('0'),
                'sql_cmd' => $this->text()->notNull(),
                'roles' => $this->text(),
                'comments' => $this->text(),
                'tags' => $this->text(),
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
        $this->dropTable('{{%Report_Query}}');
    }
}
