<?php

use yii\db\Expression;
use yii\db\Migration;

/**
 * Class m180709_111851_add_column_brand_name_eng
 */
class m180709_111851_add_column_brand_name_eng extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->addColumn('brands', 'name_eng', $this->string()->notNull()->after('name'));
        $this->update('brands', ['name_eng' => new Expression('name')]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropColumn('brands', 'name_eng');
    }
}
