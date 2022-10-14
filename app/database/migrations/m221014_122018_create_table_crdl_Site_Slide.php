<?php

use yii\db\Migration;

class m221014_122018_create_table_crdl_Site_Slide extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Site_Slide}}',
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
            ],
            $tableOptions
        );

        $this->createIndex('created_by', '{{%Site_Slide}}', ['created_by']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%Site_Slide}}');
    }
}
