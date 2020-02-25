<?php

use yii\db\Migration;

/**
 * Class m200225_192432_add_primary_key_mbr_sap_model_import
 */
class m200225_192432_add_primary_key_mbr_sap_model_import extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('mbr_sap_model_import', 'id', $this->primaryKey()->first());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('mbr_sap_model_import', 'id');
    }
}
