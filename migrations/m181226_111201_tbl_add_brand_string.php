<?php

use yii\db\Migration;

/**
 * Class m181226_115949_m181226_111201_tbl_add_brand_string
 */
class m181226_111201_tbl_add_brand_string extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('aeb_temporary_aeb_region_data','brand',$this->string()->notNull()->after('id'));
        $this->alterColumn('aeb_temporary_aeb_region_data','brand_id',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('aeb_temporary_aeb_region_data','brand_id',$this->integer()->notNull());
        $this->dropColumn('aeb_temporary_aeb_region_data','brand');
    }
}
