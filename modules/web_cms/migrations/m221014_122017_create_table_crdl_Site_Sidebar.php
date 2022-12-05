<?php

use yii\db\Migration;

class m221014_122017_create_table_crdl_Site_Sidebar extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Site_Sidebar}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'parent_label' => $this->string(140)->notNull(),
                'route' => $this->string(140)->notNull(),
                'icon' => $this->string(140),
                'inactive' => $this->boolean(),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%Site_Sidebar}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Site_Sidebar}}');
    }
}
