<?php

use yii\db\Migration;

/**
 * Class m201020_111256_add_incompatible_options_codes_in_eqt_option
 */
class m201020_111256_add_incompatible_options_codes_in_eqt_option extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->addColumn('eqt_option', 'incompatible_options_codes', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropColumn('eqt_option', 'incompatible_options_codes');
    }
}
