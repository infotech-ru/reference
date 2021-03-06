<?php

use yii\db\Migration;

/**
 * Class m201020_111256_add_incompatible_options_codes_in_eqt_option
 */
class m201020_111257_add_incompatible_options_codes_in_eqt_model_option extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('eqt_model_option', 'incompatible_options_codes', $this->text());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('eqt_model_option', 'incompatible_options_codes');
    }
}
