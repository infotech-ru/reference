<?php

use yii\db\Migration;

/**
 * Class m200728_071712_add_color_in_brands
 */
class m200728_071712_add_color_in_brands extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->addColumn('brands', 'color', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropColumn('brands', 'color');
    }
}
