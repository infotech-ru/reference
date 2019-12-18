<?php

use yii\db\Migration;

class m191118_092423_atuoru_old_fields extends Migration
{
    public function safeUp()
    {
        $this->renameColumn('eqt_autoru_complectation_map', 'map_id', '_delete_map_id');
        $this->renameColumn('eqt_autoru_configuration', 'serie_id', '_delete_serie_id');
        $this->renameColumn('eqt_autoru_folder', 'generation_id', '_delete_generation_id');
    }
    
    public function safeDown()
    {
        $this->renameColumn('eqt_autoru_complectation_map', '_delete_map_id', 'map_id');
        $this->renameColumn('eqt_autoru_configuration', '_delete_serie_id', 'serie_id');
        $this->renameColumn('eqt_autoru_folder', '_delete_generation_id', 'generation_id');
    }
}
