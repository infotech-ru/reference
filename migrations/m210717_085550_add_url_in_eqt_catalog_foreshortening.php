<?php

use yii\db\Migration;

/**
 * Class m210717_085550_add_url_in_eqt_catalog_foreshortening
 */
class m210717_085550_add_url_in_eqt_catalog_foreshortening extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('eqt_catalog_foreshortening', 'url', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('eqt_catalog_foreshortening', 'url');
    }
}
