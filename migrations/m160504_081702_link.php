<?php

use yii\db\Migration;

class m160504_081702_link extends Migration
{
    public function up()
    {
        $this->execute(
            'update car_model cm inner join car_mark cb on cm.id_car_mark = cb.id_car_mark inner join models m on m.brand_id = cb.ref_brand_id and cm.name = m.name and cm.ref_model_id is null set cm.ref_model_id = m.id'
        );
    }

    public function down()
    {
    }
}
