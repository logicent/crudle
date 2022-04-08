<?php

use yii\db\Migration;

class m220408_103843_create_table_app_module extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%app_module}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'route' => $this->string(140)->notNull(),
                'label' => $this->string(140)->notNull(),
                'group' => $this->string(140)->notNull(),
                'inactive' => $this->boolean(),
                'icon' => $this->string(140),
                'icon_path' => $this->string(140),
                'icon_color' => $this->string(140),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%app_module}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%app_module}}');
    }
}
