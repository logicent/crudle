<?php

use yii\db\Migration;

class m220525_053532_create_table_site_form_field extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%site_form_field}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'site_form_id' => $this->string(140)->notNull(),
                'label' => $this->string(280)->notNull(),
                'attribute' => $this->string(140),
                'is_required' => $this->boolean(),
                'default' => $this->string(140),
                'is_readonly' => $this->boolean(),
                'value' => $this->string(140),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%site_form_field}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%site_form_field}}');
    }
}
