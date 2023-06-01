<?php

use yii\db\Migration;

/**
 * Class m201229_105334_add_column_brand_vehicle_type
 */
class m201229_105334_add_column_brand_vehicle_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('brands', 'vehicle_type', $this->tinyInteger()->notNull()->defaultValue(1));
        $this->alterColumn('brands', 'vehicle_type', $this->tinyInteger()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('brands', 'vehicle_type');
    }
}
