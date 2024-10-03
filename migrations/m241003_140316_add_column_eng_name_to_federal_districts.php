<?php

use yii\db\Migration;

/**
 * Class m241003_140316_add_column_eng_name_to_federal_districts
 */
class m241003_140316_add_column_eng_name_to_federal_districts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('federal_districts', 'eng_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('federal_districts', 'eng_name');
    }
}
