<?php

use yii\db\Migration;

/**
 * Class m200114_131956_add_column_body_type_to_eqt_autoru_lkt_folder_serie
 */
class m200114_131956_add_column_body_type_to_eqt_autoru_lkt_folder_serie extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('eqt_autoru_lkt_folder_serie', 'body_type', $this->integer()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('eqt_autoru_lkt_folder_serie', 'body_type');
    }
}
