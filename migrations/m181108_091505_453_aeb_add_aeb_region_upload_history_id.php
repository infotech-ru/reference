<?php

use yii\db\Migration;

/**
 * Class m181108_091505_453_add_aeb_region_upload_history_id
 */
class m181108_091505_453_aeb_add_aeb_region_upload_history_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('aeb_model_mapping', 'aeb_region_upload_history_id', $this->integer());
        $this->addForeignKey(
            'model_mapping_upload_idx',
            'aeb_model_mapping',
            'aeb_region_upload_history_id',
            'aeb_region_upload_history',
            'id'
        );

        $this->addColumn('aeb_region_mapping', 'aeb_region_upload_history_id', $this->integer());
        $this->addForeignKey(
            'region_mapping_upload_idx',
            'aeb_region_mapping',
            'aeb_region_upload_history_id',
            'aeb_region_upload_history',
            'id'
        );

        $this->addColumn('aeb_city_mapping', 'aeb_region_upload_history_id', $this->integer());
        $this->addForeignKey(
            'city_mapping_upload_idx',
            'aeb_city_mapping',
            'aeb_region_upload_history_id',
            'aeb_region_upload_history',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('model_mapping_upload_idx', 'aeb_model_mapping');
        $this->dropColumn('aeb_model_mapping', 'aeb_region_upload_history_id');

        $this->dropForeignKey('region_mapping_upload_idx', 'aeb_region_mapping');
        $this->dropColumn('aeb_region_mapping', 'aeb_region_upload_history_id');

        $this->dropForeignKey('city_mapping_upload_idx', 'aeb_city_mapping');
        $this->dropColumn('aeb_city_mapping', 'aeb_region_upload_history_id');
    }
}
