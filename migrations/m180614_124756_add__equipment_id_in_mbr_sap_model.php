<?php

use yii\db\Migration;

class m180614_124756_add__equipment_id_in_mbr_sap_model extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn(
            'mbr_sap_model',
            'equipment_id',
            $this->integer()->notNull()->defaultValue(0)->after('modification_id')
        );

        $this->dropPrimaryKey('PRIMARY', 'mbr_sap_model');
        $this->addPrimaryKey(
            'PRIMARY KEY',
            'mbr_sap_model',
            [
                'model_id',
                'generation_id',
                'serie_id',
                'modification_id',
                'equipment_id',
            ]
        );
    }

    public function safeDown(): void
    {
        $this->dropColumn('mbr_sap_model', 'equipment_id');

        $this->dropPrimaryKey('PRIMARY', 'mbr_sap_model');
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
}
