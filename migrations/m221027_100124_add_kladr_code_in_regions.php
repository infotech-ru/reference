<?php

use yii\db\Migration;

/**
 * Class m221027_100124_add_kladr_code_in_regions
 */
class m221027_100124_add_kladr_code_in_regions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('regions', 'kladr_code', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('regions', 'kladr_code');
    }
}
