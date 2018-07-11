<?php

use yii\db\Migration;

class m180329_221323_create_mbr_sap_model extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'mbr_sap_model',
            [
                'model_id' => $this->integer()->notNull(),
                'generation_id' => $this->integer()->notNull(),
                'serie_id' => $this->integer()->notNull(),
                'modification_id' => $this->integer()->notNull(),
                'model_code' => $this->string()->notNull()->notNull(),
            ]
        );

        $this->addPrimaryKey(
            'PRIMARY KEY',
            'mbr_sap_model',
            [
                'model_id',
                'generation_id',
                'serie_id',
                'modification_id',
            ]
        );
    }

    public function safeDown()
    {
        $this->dropTable('mbr_sap_model');
    }
}
