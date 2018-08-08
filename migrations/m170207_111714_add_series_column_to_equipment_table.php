<?php

use yii\db\Migration;

/**
 * Handles adding series to table `equipment`.
 */
class m170207_111714_add_series_column_to_equipment_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn(
            'eqt_equipment',
            'series_id',
            $this->integer()->defaultValue(null)->after('model_id')
        );
        $this->addForeignKey(
            'eqt_fk_equipment_series',
            'eqt_equipment',
            'series_id',
            'car_serie',
            'id_car_serie',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('eqt_fk_equipment_series', 'eqt_equipment');
        $this->dropColumn('eqt_equipment', 'series_id');
    }
}
