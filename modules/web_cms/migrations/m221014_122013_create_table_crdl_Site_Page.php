<?php

use yii\db\Migration;

class m221014_122013_create_table_crdl_Site_Page extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Site_Page}}',
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
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%Site_Page}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Site_Page}}');
    }
}
