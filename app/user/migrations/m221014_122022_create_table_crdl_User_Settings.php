<?php

use yii\db\Migration;

class m221014_122022_create_table_crdl_User_Settings extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%User_Settings}}',
            [
                'id' => $this->string(140)->notNull()->append('PRIMARY KEY'),
                'user_id' => $this->string(140)->notNull(),
                'view_model' => $this->string(140),
                'view_settings' => $this->text(),
                'comments' => $this->text(),
                'created_at' => $this->dateTime(),
                'created_by' => $this->string(140),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
            ],
            $tableOptions
        );

        $this->createIndex('user_id', '{{%User_Settings}}', ['user_id']);
    }

    public function safeDown()
    {
        $this->dropTable('{{%User_Settings}}');
    }
}
