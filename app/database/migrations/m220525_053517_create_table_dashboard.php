<?php

use yii\db\Migration;

class m220525_053517_create_table_dashboard extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%dashboard}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'route' => $this->string(140),
                'heading' => $this->string(140)->notNull(),
                'description' => $this->text(),
                'module' => $this->string(140),
                'inactive' => $this->boolean(),
                'roles' => $this->text(),
                'icon' => $this->string(140),
                'icon_path' => $this->string(140),
                'icon_color' => $this->string(140),
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

        $this->createIndex('created_by', '{{%dashboard}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%dashboard}}');
    }
}
