<?php

use yii\db\Migration;

/**
 * Class m240613_150457_add_column_to_autoru_maps
 */
class m240613_150457_add_column_to_autoru_maps extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('eqt_autoru_folder', 'autoru_model_name', $this->string());
        $this->addColumn('eqt_autoru_folder', 'autoru_generation_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('eqt_autoru_folder', 'autoru_model_name');
        $this->dropColumn('eqt_autoru_folder', 'autoru_generation_name');
    }
}
