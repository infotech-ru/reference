<?php

use yii\db\Migration;

class m170112_064127_models_index extends Migration
{
    public function up()
    {
        $this->createIndex('brand_id_is_recent', 'models', 'brand_id,is_recent');
    }

    public function down()
    {
        $this->dropIndex('brand_id_is_recent', 'models');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
