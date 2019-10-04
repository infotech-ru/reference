<?php

use yii\db\Migration;

/**
 * Class m181008_091703_tbl_brand_add_col_vin_man
 */
class m181008_091703_tbl_brand_add_col_vin_man extends Migration
{
   /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('brands', 'is_vin_manufacturer', $this->integer(1)->notNull()->defaultValue(0)->comment('Ипользуется ли вин производителя'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('brands', 'is_vin_manufacturer');
    }
}
