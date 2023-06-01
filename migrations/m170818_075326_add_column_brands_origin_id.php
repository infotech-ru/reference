<?php

use yii\db\Migration;

class m170818_075326_add_column_brands_origin_id extends Migration
{
    public function safeUp(): void
    {
        $this->addColumn('brands', 'origin_id', $this->integer()->comment('ссылка на таблицу eqt_car_mark'));
        $this->execute(
            'update brands, car_mark set brands.origin_id = id_car_mark where car_mark.ref_brand_id = brands.id'
        );
    }

    public function safeDown(): void
    {
        $this->dropColumn('brands', 'origin_id');
    }
}
