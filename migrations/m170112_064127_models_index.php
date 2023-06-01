<?php

use yii\db\Migration;

class m170112_064127_models_index extends Migration
{
    public function safeUp(): void
    {
        $this->createIndex('brand_id_is_recent', 'models', 'brand_id,is_recent');
    }

    public function safeDown(): void
    {
        $this->dropIndex('brand_id_is_recent', 'models');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp():void
    {
    }

    public function safeDown():void
    {
    }
    */
}
