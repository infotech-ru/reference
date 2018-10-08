<?php

use yii\db\Migration;

/**
 * Class m181008_091703_tbl_brand_add_col_vin_man
 */
class m181008_091703_tbl_brand_add_col_vin_man extends Migration
{
    const TBL = 'brands';
    const COL = 'is_vin_manufacturer';
    
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TBL,self::COL,$this->integer(1)->notNull()->defaultValue(0)->comment('Ипользуется ли вин производителя'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TBL,self::COL);
        return true;
    }
}
