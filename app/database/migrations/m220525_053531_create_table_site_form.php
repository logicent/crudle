<?php

use yii\db\Migration;

class m220525_053531_create_table_site_form extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%site_form}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'title' => $this->string(280)->notNull(),
                'status' => $this->string(140),
                'comments' => $this->text(),
                'published' => $this->boolean(),
                'date_published' => $this->date(),
                'tags' => $this->text(),
                'layout' => $this->string(140),
                'route' => $this->string(140),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%site_form}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%site_form}}');
    }
}
