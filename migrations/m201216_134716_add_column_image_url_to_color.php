<?php

use yii\db\Migration;

/**
 * Class m201216_134716_add_column_image_url_to_color
 */
class m201216_134716_add_column_image_url_to_color extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('eqt_color', 'image_url', $this->string()->after('name'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('eqt_color', 'image_url');
    }
}
