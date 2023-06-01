<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vehicle_verification_program`.
 */
class m180815_133131_create_vehicle_verification_program_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vehicle_verification_program', [
            'id' => $this->primaryKey(),
            'brand_id' => $this->integer()->notNull()->unsigned(),
            'name' => $this->string(),
            'description' => $this->text(),
            'photo' => $this->string(),
        ], 'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci');
        $this->addForeignKey(
            'fk_vehicle_verification_program_brand',
            'vehicle_verification_program',
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
    public function down()
    {
        $this->dropForeignKey('fk_vehicle_verification_program_brand', 'vehicle_verification_program');
        $this->dropTable('vehicle_verification_program');
    }
}
