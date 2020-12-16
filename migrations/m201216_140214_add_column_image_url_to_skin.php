<?php

use yii\db\Migration;

/**
 * Class m201216_140214_add_column_image_url_to_skin
 */
class m201216_140214_add_column_image_url_to_skin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('eqt_skin', 'image_url', $this->string()->after('name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('eqt_skin', 'image_url');
    }
}
