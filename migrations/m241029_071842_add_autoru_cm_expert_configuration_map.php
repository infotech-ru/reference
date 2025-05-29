<?php

use yii\db\Migration;

/**
 * Class m241029_071842_add_cm_expert_models_map
 */
class m241029_071842_add_autoru_cm_expert_configuration_map extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('autoru_cm_expert_configuration_map', [
            'id' => $this->primaryKey(),

            'cm_expert_brand_id' => $this->integer(),
            'cm_expert_model_id' => $this->integer(),
            'cm_expert_generation_id' => $this->integer(),
            'cm_expert_body' => $this->integer(),
            'cm_expert_doors' => $this->integer(),
            'cm_expert_engine' => $this->integer(),
            'cm_expert_volume' => $this->string(),
            'cm_expert_power' => $this->integer(),
            'cm_expert_drive' => $this->integer(),
            'cm_expert_gear' => $this->integer(),

            'autoru_brand_name' => $this->string(),
            'autoru_model_name' => $this->string(),
            'autoru_generation_id' => $this->integer(),
            'autoru_configuration_id' => $this->integer(),
            'autoru_tech_param_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('autoru_cm_expert_configuration_map');
    }
}
