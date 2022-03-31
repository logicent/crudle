<?php

use yii\db\Migration;

class m220331_141150_create_table_site_post_author extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%site_post_author}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'full_name' => $this->string(140)->notNull(),
                'designation' => $this->text(),
                'image_link' => $this->string(140),
                'bio' => $this->string(280),
                'inactive' => $this->boolean(),
                'date_published' => $this->date(),
                'route' => $this->string(140),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%site_post_author}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%site_post_author}}');
    }
}
