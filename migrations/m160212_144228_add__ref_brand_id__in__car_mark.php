<?php

use yii\db\Migration;

class m160212_144228_add__ref_brand_id__in__car_mark extends Migration
{
    public function up()
    {
        $this->addColumn('car_mark', 'ref_brand_id', 'int NULL DEFAULT NULL AFTER id_car_mark');
        $this->createIndex('ref_brand_id', 'car_mark', 'ref_brand_id', true);
    }

    public function down()
    {
        $this->dropIndex('ref_brand_id', 'car_mark');
        $this->dropColumn('car_mark', 'ref_brand_id');
    }
}
