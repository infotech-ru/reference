<?php

use yii\db\Migration;

class m160212_144730_drop__brand_model_ids extends Migration
{
    public function up()
    {
        $this->db->createCommand(
            '
            UPDATE car_mark
            JOIN brand_model_ids sync ON car_mark.id_car_mark = sync.new_id AND sync.`type` = "brand"
            SET car_mark.ref_brand_id = sync.old_id
        '
        )->execute();

        $this->db->createCommand(
            'create temporary table `tmp` select car_model.id_car_model id, models.id ref_model_id
from car_model
join car_mark on car_mark.id_car_mark = car_model.id_car_mark
join models on lower(models.name) = lower(car_model.name)
join brands on brands.id = models.brand_id
where car_mark.ref_brand_id = brands.id;
update car_model join tmp on tmp.id=car_model.id_car_model set car_model.ref_model_id = tmp.ref_model_id;
drop temporary table `tmp`;'
        )->execute();

        $this->dropTable('brand_model_ids');
    }

    public function down()
    {
        $this->createTable(
            'brand_model_ids',
            [
                'id' => 'pk',
                'old_id' => 'int NOT NULL',
                'new_id' => 'int NOT NULL',
                'type' => 'varchar(255) NOT NULL',
            ]
        );
        $this->createIndex('old_id_new_id', 'brand_model_ids', ['old_id', 'new_id'], true);
    }
}
