<?php

use yii\db\Migration;

/**
 * Class m230127_141815_add_equipment_id_in_model_alias
 */
class m230127_141815_add_equipment_id_in_model_alias extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('model_alias', 'equipment_id', $this->integer());
        $this->addForeignKey(
            'fk_model_alias_equipment_id',
            'model_alias',
            'equipment_id',
            'eqt_equipment',
            'id',
            'CASCADE',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('model_alias', 'equipment_id');
    }
}
