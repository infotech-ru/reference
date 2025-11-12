<?php

use yii\db\Migration;

/**
 * Class m251112_132726_add_is_archive_fields_to_elt_poisk_tables
 */
class m251112_132726_add_is_archive_fields_to_elt_poisk_tables extends Migration
{
    public function safeUp()
    {
        $this->addColumn('elt_legal_entity_type_map', 'is_archive', $this->boolean()->defaultValue(false));
        $this->addColumn('elt_make', 'is_archive', $this->boolean()->defaultValue(false));
        $this->addColumn('elt_model', 'is_archive', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('elt_legal_entity_type_map', 'is_archive');
        $this->dropColumn('elt_make', 'is_archive');
        $this->dropColumn('elt_model', 'is_archive');
    }
}
