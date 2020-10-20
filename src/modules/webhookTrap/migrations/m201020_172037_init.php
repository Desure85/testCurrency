<?php

use yii\db\Migration;

/**
 * Class m201020_172037_init
 */
class m201020_172037_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%webhook%}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'description' => $this->string(128)->null(),
            'uri' => $this->string(128)->notNull(),
            'created_at' => $this->integer(11)->null(),
            'updated_at' => $this->integer(11)->null()
        ]);

        $this->createTable('{{%webhook_log%}}', [
            'id' => $this->primaryKey(),
            'webhook_id' => $this->string(128)->notNull(),
            'method' => $this->string(128)->null(),
            'headers' => $this->text()->null(),
            'body'    => $this->text()->null(),
            'created_at' => $this->integer(11)->null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%webhook%}}');
        $this->dropTable('{{%webhook_log%}}');
    }
}
