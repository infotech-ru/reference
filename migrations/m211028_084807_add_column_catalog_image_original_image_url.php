<?php

use yii\db\Migration;

/**
 * Class m211028_084807_add_column_catalog_image_original_image_url
 */
class m211028_084807_add_column_catalog_image_original_image_url extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('eqt_catalog_image', 'original_image_url', $this->string());
        $this->addColumn('eqt_catalog_image', 'original_image_width', $this->integer());
        $this->addColumn('eqt_catalog_image', 'original_image_height', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('eqt_catalog_image', 'original_image_height');
        $this->dropColumn('eqt_catalog_image', 'original_image_width');
        $this->dropColumn('eqt_catalog_image', 'original_image_url');
    }
}
