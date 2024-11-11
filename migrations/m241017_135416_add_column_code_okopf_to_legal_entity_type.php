<?php

use yii\db\Migration;

/**
 * Class m241017_135416_add_column_code_okopf_to_legal_entity_type
 */
class m241017_135416_add_column_code_okopf_to_legal_entity_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        return $this->addColumn(
            'legal_entity_type',
            'code_okopf',
            $this->integer(5),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return $this->dropColumn(
            'legal_entity_type',
            'code_okopf',
        );
    }
}
