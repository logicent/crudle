<?php

use yii\db\Migration;

class m220525_053534_create_table_site_post extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%site_post}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'title' => $this->string(280)->notNull(),
                'content' => $this->text(),
                'featured_image' => $this->string(140),
                'category_id' => $this->string(140),
                'author' => $this->string(140),
                'slug' => $this->string(280)->notNull(),
                'parent' => $this->string(140),
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

        $this->createIndex('created_by', '{{%site_post}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%site_post}}');
    }
}
