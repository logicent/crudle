<?php

use yii\db\Migration;

class m221014_122015_create_table_crdl_Site_Post_Author extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Site_Post_Author}}',
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
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%Site_Post_Author}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Site_Post_Author}}');
    }
}
