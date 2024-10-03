<?php

use yii\db\Migration;

/**
 * Class m241003_135425_add_column_eng_name_to_regions
 */
class m241003_135425_add_column_eng_name_to_regions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('regions', 'eng_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('regions', 'eng_name');
    }
}
