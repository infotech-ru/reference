<?php

use yii\db\Migration;

/**
 * Class m180703_144825_add_columns_federal_districts_code_okato
 */
class m180703_144825_add_columns_federal_districts_code_okato extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('federal_districts', 'short_name', $this->string());
        $this->addColumn('federal_districts', 'okato', $this->char(2));
        $this->addColumn('federal_districts', 'status', $this->smallInteger()->notNull());
        $this->addColumn('federal_districts', 'country_id', $this->integer());
        $this->addForeignKey('fk_federal_districts_country_id', 'federal_districts', 'country_id', 'countries', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropForeignKey('fk_federal_districts_country_id', 'federal_districts');
        $this->dropColumn('federal_districts', 'country_id');
        $this->dropColumn('federal_districts', 'status');
        $this->dropColumn('federal_districts', 'short_name');
        $this->dropColumn('federal_districts', 'okato');
    }
}
