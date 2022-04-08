<?php

use yii\db\Migration;

class m220408_103858_create_table_settings extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%settings}}',
            [
                'id' => $this->string(140)->notNull(),
                'model_name' => $this->string(140)->notNull(),
                'form_title' => $this->string(140),
                'description' => $this->text(),
                'attribute_name' => $this->string(140)->notNull(),
                'attribute_label' => $this->string(140),
                'type' => $this->string(140)->defaultValue('Setup'),
                'hidden' => $this->boolean()->defaultValue('0'),
                'attribute_value' => $this->text(),
                'validation_rule' => $this->text(),
                'default_value' => $this->string(140),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'comments' => $this->text(),
            ],
            $tableOptions
        );

        $this->addPrimaryKey('PRIMARYKEY', '{{%settings}}', ['model_name', 'attribute_name']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%settings}}');
    }
}
