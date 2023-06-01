<?php

use yii\db\Migration;

/**
 * Handles the creation of table `model_option_tag`.
 */
class m171004_100929_create_model_option_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable(
            'eqt_model_option_tag',
            [
                'id' => $this->primaryKey(),
                'model_id' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );

        $this->addColumn(
            'eqt_model_option',
            'model_option_tag_id',
            $this->integer()->defaultValue(null)->after('option_group_id')
        );

        $this->addForeignKey(
            'eqt_fk_model_option_model_option_tag',
            'eqt_model_option',
            'model_option_tag_id',
            'eqt_model_option_tag',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropForeignKey('eqt_fk_model_option_model_option_tag', 'eqt_model_option');
        $this->dropColumn('eqt_model_option', 'model_option_tag_id');
        $this->dropTable('eqt_model_option_tag');
    }
}
