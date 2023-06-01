<?php

use yii\db\Migration;

/**
 * Class m200703_111920_add_modification_id_in_model_alias
 */
class m200703_111920_add_modification_id_in_model_alias extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->addColumn('model_alias', 'modification_id', $this->integer());

        $this->addForeignKey(
            'fk_model_alias_modification_id',
            'model_alias',
            'modification_id',
            'car_modification',
            'id_car_modification'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropForeignKey('fk_model_alias_modification_id', 'model_alias');
        $this->dropColumn('model_alias', 'modification_id');
    }
}
