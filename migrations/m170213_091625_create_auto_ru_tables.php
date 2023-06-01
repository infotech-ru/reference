<?php

use yii\db\Expression;
use yii\db\Migration;

class m170213_091625_create_auto_ru_tables extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'eqt_car_type',
            [
                'id_car_type' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );

        $this->createTable(
            'eqt_car_mark',
            [
                'id_car_mark' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'id_car_type' => $this->integer()->notNull(),
                'name_rus' => $this->string(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey('eqt_car_mark_car_type', 'eqt_car_mark', 'id_car_type', 'eqt_car_type', 'id_car_type');

        $this->createTable(
            'eqt_car_model',
            [
                'id_car_model' => $this->primaryKey(),
                'id_car_mark' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
                'id_car_type' => $this->integer()->notNull(),
                'name_rus' => $this->string(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_car_model_car_type',
            'eqt_car_model',
            'id_car_type',
            'eqt_car_type',
            'id_car_type'
        );
        $this->addForeignKey(
            'eqt_car_model_car_mark',
            'eqt_car_model',
            'id_car_mark',
            'eqt_car_mark',
            'id_car_mark'
        );

        $this->createTable(
            'eqt_car_generation',
            [
                'id_car_generation' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'id_car_model' => $this->integer()->notNull(),
                'year_begin' => $this->string()->notNull(),
                'year_end' => $this->string(),
                'id_car_type' => $this->integer()->notNull(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_car_generation_car_type',
            'eqt_car_generation',
            'id_car_type',
            'eqt_car_type',
            'id_car_type'
        );
        $this->addForeignKey(
            'eqt_car_generation_car_model',
            'eqt_car_generation',
            'id_car_model',
            'eqt_car_model',
            'id_car_model'
        );

        $this->createTable(
            'eqt_car_serie',
            [
                'id_car_serie' => $this->primaryKey(),
                'id_car_model' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
                'id_car_generation' => $this->integer(),
                'id_car_type' => $this->integer()->notNull(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_car_serie_car_type',
            'eqt_car_serie',
            'id_car_type',
            'eqt_car_type',
            'id_car_type'
        );
        $this->addForeignKey(
            'eqt_car_serie_car_model',
            'eqt_car_serie',
            'id_car_model',
            'eqt_car_model',
            'id_car_model'
        );
        $this->addForeignKey(
            'eqt_car_serie_car_generation',
            'eqt_car_serie',
            'id_car_generation',
            'eqt_car_generation',
            'id_car_generation'
        );

        $this->createTable(
            'eqt_car_modification',
            [
                'id_car_modification' => $this->primaryKey(),
                'id_car_serie' => $this->integer()->notNull(),
                'id_car_model' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
                'id_car_type' => $this->integer()->notNull(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_car_modification_car_type',
            'eqt_car_modification',
            'id_car_type',
            'eqt_car_type',
            'id_car_type'
        );
        $this->addForeignKey(
            'eqt_car_modification_car_model',
            'eqt_car_modification',
            'id_car_model',
            'eqt_car_model',
            'id_car_model'
        );
        $this->addForeignKey(
            'eqt_car_modification_car_serie',
            'eqt_car_modification',
            'id_car_serie',
            'eqt_car_serie',
            'id_car_serie'
        );

        $this->createTable(
            'eqt_car_equipment',
            [
                'id_car_equipment' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'id_car_modification' => $this->integer()->notNull(),
                'price_min' => $this->integer(),
                'id_car_type' => $this->integer()->notNull(),
                'year' => $this->integer(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_car_equipment_car_type',
            'eqt_car_equipment',
            'id_car_type',
            'eqt_car_type',
            'id_car_type'
        );
        $this->addForeignKey(
            'eqt_car_equipment_car_modification',
            'eqt_car_equipment',
            'id_car_modification',
            'eqt_car_modification',
            'id_car_modification'
        );

        $this->createTable(
            'eqt_car_option',
            [
                'id_car_option' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'id_parent' => $this->integer(),
                'id_car_type' => $this->integer()->notNull(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_car_option_car_type',
            'eqt_car_option',
            'id_car_type',
            'eqt_car_type',
            'id_car_type'
        );

        $this->createTable(
            'eqt_car_option_value',
            [
                'id_car_option_value' => $this->primaryKey(),
                'is_base' => $this->boolean(),
                'id_car_option' => $this->integer()->notNull(),
                'id_car_equipment' => $this->integer()->notNull(),
                'id_car_type' => $this->integer()->notNull(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_car_option_value_car_type',
            'eqt_car_option_value',
            'id_car_type',
            'eqt_car_type',
            'id_car_type'
        );
        $this->addForeignKey(
            'eqt_car_option_value_car_option',
            'eqt_car_option_value',
            'id_car_option',
            'eqt_car_option',
            'id_car_option'
        );
        $this->addForeignKey(
            'eqt_car_option_value_car_equipment',
            'eqt_car_option_value',
            'id_car_equipment',
            'eqt_car_equipment',
            'id_car_equipment'
        );

        $this->createTable(
            'eqt_car_characteristic',
            [
                'id_car_characteristic' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'id_parent' => $this->integer(),
                'id_car_type' => $this->integer()->notNull(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_car_characteristic_car_type',
            'eqt_car_characteristic',
            'id_car_type',
            'eqt_car_type',
            'id_car_type'
        );

        $this->createTable(
            'eqt_car_characteristic_value',
            [
                'id_car_characteristic_value' => $this->primaryKey(),
                'value' => $this->string()->notNull(),
                'unit' => $this->string(),
                'id_car_characteristic' => $this->integer()->notNull(),
                'id_car_modification' => $this->integer()->notNull(),
                'id_car_type' => $this->integer()->notNull(),
                'updated_at' => $this->timestamp()->notNull()->defaultValue(new Expression('CURRENT_TIMESTAMP')),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_car_characteristic_value_car_type',
            'eqt_car_characteristic_value',
            'id_car_type',
            'eqt_car_type',
            'id_car_type'
        );
        $this->addForeignKey(
            'eqt_car_characteristic_value_car_characteristic',
            'eqt_car_characteristic_value',
            'id_car_characteristic',
            'eqt_car_characteristic',
            'id_car_characteristic'
        );
        $this->addForeignKey(
            'eqt_car_characteristic_value_car_modification',
            'eqt_car_characteristic_value',
            'id_car_modification',
            'eqt_car_modification',
            'id_car_modification'
        );
    }

    public function safeDown(): void
    {
        $this->dropTable('eqt_car_characteristic_value');
        $this->dropTable('eqt_car_characteristic');
        $this->dropTable('eqt_car_option_value');
        $this->dropTable('eqt_car_option');
        $this->dropTable('eqt_car_equipment');
        $this->dropTable('eqt_car_modification');
        $this->dropTable('eqt_car_serie');
        $this->dropTable('eqt_car_generation');
        $this->dropTable('eqt_car_model');
        $this->dropTable('eqt_car_mark');
        $this->dropTable('eqt_car_type');
    }
}
