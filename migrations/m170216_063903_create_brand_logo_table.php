<?php

use yii\db\Migration;

/**
 * Handles the creation of table `eqt_brand_logo`.
 */
class m170216_063903_create_brand_logo_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp(): void
    {
        $this->createTable(
            'eqt_brand_logo',
            [
                'brand_id' => $this->integer()->unsigned()->notNull(),
                'url' => $this->string()->notNull(),
            ]
        );

        $this->addPrimaryKey(
            'eqt_brand_logo_pk',
            'eqt_brand_logo',
            ['brand_id']
        );

        $this->addForeignKey(
            'eqt_fk_brand_logo_brand',
            'eqt_brand_logo',
            'brand_id',
            'brands',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown(): void
    {
        $this->dropForeignKey(
            'eqt_fk_brand_logo_brand',
            'eqt_brand_logo'
        );

        $this->dropPrimaryKey(
            'eqt_brand_logo_pk',
            'eqt_brand_logo'
        );

        $this->dropTable('eqt_brand_logo');
    }
}
