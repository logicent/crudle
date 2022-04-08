<?php

use yii\db\Migration;

class m220408_103905_create_table_site_post_category extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%site_post_category}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'name' => $this->string(140)->notNull(),
                'description' => $this->text(),
                'slug' => $this->string(140),
                'parent' => $this->string(140),
                'published' => $this->boolean(),
                'comments' => $this->text(),
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

        $this->createIndex('created_by', '{{%site_post_category}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%site_post_category}}');
    }
}
