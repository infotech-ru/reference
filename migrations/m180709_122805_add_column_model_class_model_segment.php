<?php

use yii\db\Migration;

/**
 * Class m180709_122805_add_column_model_class_model_segment
 */
class m180709_122805_add_column_model_class_model_segment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('models', 'model_class_id', $this->integer());
        $this->addForeignKey('fk_models_model_class_id', 'models', 'model_class_id', 'model_class', 'id');
        $this->addColumn('models', 'model_segment_id', $this->integer());
        $this->addForeignKey('fk_models_model_segment_id', 'models', 'model_segment_id', 'model_segment', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_models_model_segment_id', 'models');
        $this->dropColumn('models', 'model_segment_id');
        $this->dropForeignKey('fk_models_model_class_id', 'models');
        $this->dropColumn('models', 'model_class_id');
    }
}
