<?php

use yii\db\Migration;

/**
 * Class m181214_122605_add_column_brand_name_market
 */
class m181214_122605_add_column_brand_name_market extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('brands', 'name_market', $this->string()->notNull()->after('name_eng')->comment('Торговое наименование'));
        $this->update('brands', ['name_market' => new Expression('name')]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('brands', 'name_market');
    }
}
