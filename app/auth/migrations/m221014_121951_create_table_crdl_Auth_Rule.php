<?php

use yii\db\Migration;

class m221014_121951_create_table_crdl_Auth_Rule extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Auth_Rule}}',
            [
                'name' => $this->string(64)->notNull()->append('PRIMARY KEY'),
                'data' => $this->binary(),
                'created_at' => $this->integer(),
                'updated_at' => $this->integer(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%Auth_Rule}}');
    }
}
