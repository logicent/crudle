<?php

use yii\db\Migration;

class m221014_122012_create_table_crdl_Site_Form_Field extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Site_Form_Field}}',
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
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%Site_Form_Field}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Site_Form_Field}}');
    }
}
