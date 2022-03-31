<?php

use yii\db\Migration;

class m220331_141148_create_table_site_page extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%site_page}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'title' => $this->string(280)->notNull(),
                'content' => $this->text(),
                'author' => $this->string(140),
                'slug' => $this->string(280)->notNull(),
                'parent' => $this->string(140),
                'status' => $this->string(140),
                'published' => $this->boolean(),
                'date_published' => $this->date(),
                'tags' => $this->text(),
                'layout' => $this->string(140),
                'route' => $this->string(140),
                'created_by' => $this->string(140)->notNull(),
                'updated_at' => $this->dateTime()->notNull(),
                'updated_by' => $this->string(140)->notNull(),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%site_page}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%site_page}}');
    }
}
