<?php

use yii\db\Migration;

class m160212_144240_add__ref_model_id__in__car_model extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('car_model', 'ref_model_id', 'int NULL DEFAULT NULL AFTER id_car_mark');
        $this->createIndex('ref_model_id', 'car_model', 'ref_model_id', true);
    }

    public function safeDown(): void
    {
        $this->dropIndex('ref_model_id', 'car_model');
        $this->dropColumn('car_model', 'ref_model_id');
    }
}
