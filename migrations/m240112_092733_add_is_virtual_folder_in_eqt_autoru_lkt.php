<?php

use yii\db\Migration;

/**
 * Class m240112_092733_add_is_virtual_folder_in_eqt_autoru_lkt
 */
class m240112_092733_add_is_virtual_folder_in_eqt_autoru_lkt extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('eqt_autoru_lkt', 'is_virtual_folder', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('eqt_autoru_lkt', 'is_virtual_folder');
    }
}
