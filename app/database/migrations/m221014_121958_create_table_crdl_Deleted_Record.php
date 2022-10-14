<?php

use yii\db\Migration;

class m221014_121958_create_table_crdl_Deleted_Record extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%Deleted_Record}}',
            [
                'id' => $this->string(140)->notNull(),
                'original_table' => $this->string(140)->notNull(),
                'original_id' => $this->string(140)->notNull(),
                'data' => $this->json(),
                'restored' => $this->boolean(),
                'restored_id' => $this->string(140),
                'comments' => $this->text(),
                'created_at' => $this->dateTime()->notNull(),
                'created_by' => $this->string(140)->notNull(),
                'updated_at' => $this->dateTime(),
                'updated_by' => $this->string(140),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%Deleted_Record}}');
    }
}
