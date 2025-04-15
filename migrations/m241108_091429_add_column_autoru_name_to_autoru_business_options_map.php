<?php

use yii\db\Migration;

/**
 * Class m241108_091429_add_column_autoru_name_to_autoru_business_options_map
 */
class m241108_091429_add_column_autoru_name_to_autoru_business_options_map extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('autoru_business_options_map', 'autoru_option_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('autoru_business_options_map', 'autoru_option_name');
    }
}
