<?php

use yii\db\Migration;

/**
 * Class m190906_111046_add_column_is_not_convert_to_catalog_image
 */
class m190906_111046_add_column_is_not_convert_to_catalog_image extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'eqt_catalog_image',
            'is_not_convert',
            $this->boolean()->defaultValue(false)
                ->comment('Флаг того, что изображение загружено без обработки')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('eqt_catalog_image', 'is_not_convert');
    }
}
