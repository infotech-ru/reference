<?php

use yii\db\Migration;

/**
 * Class m190809_102700_crate_mbr_sap_model_import
 */
class m190809_102700_crate_mbr_sap_model_import extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('mbr_sap_model_import', [
            'model_code' => $this->string()->notNull(),
            'model_name' => $this->string()->notNull(),
            'brand_code' => $this->string()->notNull(),
            'brand_name' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('mbr_sap_model_import');
    }
}
