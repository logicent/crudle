<?php

use yii\db\Migration;

class m220408_103906_create_table_site_slide extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%site_slide}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'heading' => $this->string(140)->notNull(),
                'description' => $this->string(280),
                'image_path' => $this->string(140),
                'inactive' => $this->boolean(),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
                'deleted_at' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%site_slide}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%site_slide}}');
    }
}
