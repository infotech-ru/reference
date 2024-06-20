<?php

use yii\db\Migration;

/**
 * Class m240620_111749_change_brand_id_in_vehicle_verification_program
 */
class m240620_111749_change_brand_id_in_vehicle_verification_program extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('vehicle_verification_program', 'brand_id', $this->integer()->null()->unsigned());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('vehicle_verification_program', 'brand_id', $this->integer()->notNull()->unsigned());
    }

}
