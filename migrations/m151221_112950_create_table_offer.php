<?php

use yii\db\Migration;

class m151221_112950_create_table_offer extends Migration
{
    public function safeUp()
    {
        $this->createTable(
            'eqt_offer',
            [
                'id' => $this->primaryKey(),
                'brand_id' => 'int unsigned',
                'model_id' => $this->integer(),
                'body_id' => $this->integer(),
                'modification_id' => $this->integer(),
                'equipment_id' => $this->integer(),
                'color_id' => $this->integer(),
                'skin_id' => $this->integer(),
                'year' => $this->integer(),
                'vin' => $this->string(),
                'cost' => $this->money(),
                'additions_cost' => $this->money(),
                'discount' => $this->money(),
                'trade_in_cost' => $this->money(),
                'status' => $this->integer()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey('eqt_fk_offer_brand', 'eqt_offer', 'brand_id', 'brands', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('eqt_fk_offer_model', 'eqt_offer', 'model_id', 'models', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('eqt_fk_offer_body', 'eqt_offer', 'body_id', 'bodies', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey(
            'eqt_fk_offer_modification',
            'eqt_offer',
            'modification_id',
            'car_modification',
            'id_car_modification',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey('eqt_fk_offer_color', 'eqt_offer', 'color_id', 'eqt_color', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('eqt_fk_offer_skin', 'eqt_offer', 'skin_id', 'eqt_skin', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey(
            'eqt_fk_offer_equipment',
            'eqt_offer',
            'equipment_id',
            'eqt_equipment',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('eqt_fk_offer_brand', 'eqt_offer');
        $this->dropForeignKey('eqt_fk_offer_model', 'eqt_offer');
        $this->dropForeignKey('eqt_fk_offer_body', 'eqt_offer');
        $this->dropForeignKey('eqt_fk_offer_modification', 'eqt_offer');
        $this->dropForeignKey('eqt_fk_offer_color', 'eqt_offer');
        $this->dropForeignKey('eqt_fk_offer_skin', 'eqt_offer');
        $this->dropForeignKey('eqt_fk_offer_equipment', 'eqt_offer');
        $this->dropTable('eqt_offer');
    }
}
