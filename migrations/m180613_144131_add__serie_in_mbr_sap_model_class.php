<?php

use yii\db\Migration;

class m180613_144131_add__serie_in_mbr_sap_model_class extends Migration
{
    public function safeUp()
    {
        $this->addColumn('mbr_sap_model_class', 'serie_id', $this->integer()->after('model_id'));

        $this->dropPrimaryKey('PRIMARY KEY', 'mbr_sap_model_class');
        $this->addPrimaryKey('PRIMARY KEY', 'mbr_sap_model_class', ['model_id', 'serie_id']);
    }

    public function safeDown()
    {
        $this->dropPrimaryKey('PRIMARY KEY', 'mbr_sap_model_class');
        $this->addPrimaryKey('PRIMARY KEY', 'mbr_sap_model_class', 'model_id');

        $this->dropColumn('mbr_sap_model_class', 'serie_id');
    }
}
