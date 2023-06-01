<?php

use yii\db\Migration;

class m180329_221322_create_mbr_sap_model_class extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'mbr_sap_model_class',
            [
                'model_id' => $this->integer()->notNull(),
                'class_code' => $this->string(),
                'model_code' => $this->string(),
                'brand_code' => $this->string(),
            ]
        );

        $this->addPrimaryKey('PRIMARY KEY', 'mbr_sap_model_class', 'model_id');
    }

    public function safeDown(): void
    {
        $this->dropTable('mbr_sap_model_class');
    }
}
