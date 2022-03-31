<?php

use yii\db\Migration;

class m220331_141144_create_table_report_builder extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%report_builder}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'title' => $this->string(140)->notNull(),
                'subtitle' => $this->string(140),
                'description' => $this->text(),
                'model_name' => $this->string(140),
                'group' => $this->string(140),
                'type' => $this->string(140),
                'inactive' => $this->boolean()->defaultValue('0'),
                'query_cmd' => $this->text()->notNull(),
                'roles' => $this->text(),
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
    }

    public function safeDown()
    {
        $this->dropTable('{{%report_builder}}');
    }
}
