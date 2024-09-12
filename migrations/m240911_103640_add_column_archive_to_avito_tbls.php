<?php

use yii\db\Migration;

/**
 * Class m240911_103640_add_column_archive_to_avito_tbls
 */
class m240911_103640_add_column_archive_to_avito_tbls extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('avito_make', 'is_archive', $this->boolean()->defaultValue(false));
        $this->addColumn('avito_model', 'is_archive', $this->boolean()->defaultValue(false));
        $this->addColumn('avito_generation', 'is_archive', $this->boolean()->defaultValue(false));
        $this->addColumn('avito_modification', 'is_archive', $this->boolean()->defaultValue(false));
        $this->addColumn('avito_complectation', 'is_archive', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('avito_make', 'is_archive');
        $this->dropColumn('avito_model', 'is_archive');
        $this->dropColumn('avito_generation', 'is_archive');
        $this->dropColumn('avito_modification', 'is_archive');
        $this->dropColumn('avito_complectation', 'is_archive');
    }
}
