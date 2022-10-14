<?php

use yii\db\Migration;

class m221014_122014_create_table_crdl_Site_Post extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Site_Post}}',
            [
                'id' => $this->string(280)->notNull()->append('PRIMARY KEY'),
                'title' => $this->string(280)->notNull(),
                'content' => $this->text(),
                'featured_image' => $this->string(140),
                'category_id' => $this->string(140),
                'author' => $this->string(140),
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
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%Site_Post}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Site_Post}}');
    }
}
