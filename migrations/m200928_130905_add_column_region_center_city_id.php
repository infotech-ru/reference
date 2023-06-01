<?php

use yii\db\Migration;

/**
 * Class m200928_130905_add_column_region_center_city_id
 */
class m200928_130905_add_column_region_center_city_id extends Migration
{
    public function safeUp()
    {
        $this->addColumn('regions', 'center_city_id', $this->integer());
        $this->addForeignKey('fk_regions_center_city_id', 'regions', 'center_city_id', 'cities', 'id');
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk_regions_center_city_id', 'regions');
        $this->dropColumn('regions', 'center_city_id');
    }
}
