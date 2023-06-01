<?php

use yii\db\Migration;

class m151204_094738_create_table_equipment extends Migration
{
    public function safeUp(): void
    {
        $this->createTable(
            'bodies',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'tradein_code' => $this->string(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );

        $this->createTable(
            'brand_model_ids',
            [
                'id' => $this->primaryKey(),
                'old_id' => $this->integer()->notNull(),
                'new_id' => $this->integer()->notNull(),
                'type' => $this->string()->notNull(),
                'UNIQUE KEY `old_id_new_id` (`old_id`,`new_id`)',
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );

        $this->createTable(
            'countries',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );

        $this->createTable(
            'federal_districts',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
        $this->createTable(
            'regions',
            [
                'id' => $this->primaryKey(),
                'country_id' => $this->integer()->notNull(),
                'federal_district_id' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
        $this->addForeignKey('regions_ibfk_1', 'regions', 'country_id', 'countries', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey(
            'regions_ibfk_2',
            'regions',
            'federal_district_id',
            'federal_districts',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createTable(
            'cities',
            [
                'id' => $this->primaryKey(),
                'country_id' => $this->integer()->notNull(),
                'region_id' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
        $this->addForeignKey('cities_ibfk_1', 'cities', 'country_id', 'countries', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('cities_ibfk_2', 'cities', 'region_id', 'regions', 'id', 'CASCADE', 'CASCADE');

        $this->createTable(
            'sources',
            [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'parent_id' => $this->integer(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );

        $this->createTable(
            'crms',
            [
                'id' => $this->primaryKey(),
                'code' => $this->string(16)->notNull(),
                'hostname' => $this->string(32),
                'db_name' => $this->string(32),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );

        $this->createTable(
            'car_type',
            [
                'id_car_type' => $this->primaryKey(8),
                'name' => $this->string()->notNull()->comment('Название'),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT=\'Автомобильный сайт\''
        );

        $this->createTable(
            'crm_instructions',
            [
                'id' => $this->primaryKey(),
                'userGroupCode' => $this->string(32)->notNull(),
                'brandId' => $this->integer(),
                'path' => $this->string()->notNull(),
                'name' => $this->string()->notNull(),
                'isForMobile' => $this->boolean()->notNull()->defaultValue(0),
                'excludedId' => $this->integer(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );

        $this->createTable(
            'brands',
            [
                'id' => $this->primaryKey()->unsigned(),
                'name' => $this->string()->notNull(),
                'logo' => $this->string(64)->notNull(),
                'importer_db_name' => $this->string(32)->notNull(),
                'host' => $this->string(128),
                'token' => $this->char(16),
                'ecm_id' => $this->integer(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
        $this->createTable(
            'models',
            [
                'brand_id' => $this->integer()->notNull(),
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'tradein_code' => $this->string(),
                'is_recent' => $this->boolean()->notNull()->defaultValue(0),
                'dealerpoint_code' => $this->string(),
                'ord' => $this->integer()->notNull(),
                'ecm_id' => $this->integer(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
        $this->createTable(
            'okopf',
            [
                'code' => $this->integer()->unsigned()->notNull(),
                'version' => "enum('1999','2007','2012') NOT NULL",
                'name' => $this->string()->notNull(),
                'UNIQUE KEY `code_version` (`code`,`version`)',
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
        $this->createTable(
            'okved',
            [
                'code' => $this->integer(10)->unsigned()->notNull(),
                'version' => "enum('2001') NOT NULL",
                'name' => $this->string()->notNull(),
                'UNIQUE KEY `code_version` (`code`,`version`)',
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
        $this->createTable(
            'works',
            [
                'id' => $this->primaryKey()->unsigned(),
                'name' => $this->string()->notNull(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
        $this->createIndex('index2', 'works', ['id', 'name']);

        $this->createTable(
            'stat_models',
            [
                'id' => $this->primaryKey()->unsigned(),
                'brand_id' => $this->integer()->notNull(),
                'code' => $this->string(32),
                'name' => $this->string(),
                'ord' => $this->integer()->unsigned()->notNull(),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT'
        );
        $this->createIndex('code_idx', 'stat_models', 'code', true);

        $this->createTable(
            'models_bodies',
            [
                'model_id' => $this->integer()->notNull(),
                'body_id' => $this->integer()->notNull(),
                'description' => $this->string(255),
                'photo' => $this->string(64)->notNull(),
                'PRIMARY KEY (`model_id`,`body_id`)',
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );

        $this->createTable(
            'configurable_reference_params_weights',
            [
                'id' => $this->primaryKey()->unsigned(),
                'paramId' => $this->string(32)->notNull(),
                'fieldId' => $this->integer(10)->unsigned()->notNull(),
                'weight' => $this->integer(10)->unsigned()->defaultValue(0),
            ],
            'ENGINE=InnoDB DEFAULT CHARSET=utf8'
        );
        $this->createIndex('unique', 'configurable_reference_params_weights', ['paramId', 'fieldId'], true);

        $this->safeCreateTables();
        $this->createTable(
            'eqt_equipment',
            [
                'id' => $this->primaryKey(),
                'model_id' => $this->integer()->notNull(),
                'name' => $this->string()->notNull(),
                'created_at' => $this->dateTime()->notNull(),
                'updated_at' => $this->dateTime(),
            ],
            'ENGINE=InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci'
        );
        $this->addForeignKey(
            'eqt_fk_equipment_model',
            'eqt_equipment',
            'model_id',
            'models',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    private function safeCreateTables()
    {
        $this->execute(
            <<< SQL

CREATE TABLE `car_characteristic` (
  `id_car_characteristic` int(8) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(255) DEFAULT NULL COMMENT 'Название',
  `id_parent` int(8) DEFAULT NULL COMMENT 'Родитель',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  PRIMARY KEY (`id_car_characteristic`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Характеристики автомобилей';

CREATE TABLE `car_characteristic_value` (
  `id_car_characteristic_value` int(8) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL COMMENT 'Значение',
  `unit` varchar(255) DEFAULT NULL COMMENT 'Еденица измерения',
  `id_car_characteristic` int(8) NOT NULL COMMENT 'Характеристика',
  `id_car_modification` int(8) NOT NULL COMMENT 'Модификация Авто',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Видимость',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  PRIMARY KEY (`id_car_characteristic_value`),
  UNIQUE KEY `id_characteristic` (`id_car_characteristic`,`id_car_modification`),
  UNIQUE KEY `id_car_characteristic` (`id_car_characteristic`,`id_car_modification`,`id_car_type`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Значения характеристик автомобиля';

CREATE TABLE `car_generation` (
  `id_car_generation` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Название',
  `id_car_model` int(8) NOT NULL,
  `year_begin` varchar(255) DEFAULT NULL COMMENT 'Год начала выпуска',
  `year_end` varchar(255) DEFAULT NULL COMMENT 'Год окончания выпуска',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Видимость',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  PRIMARY KEY (`id_car_generation`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Поколения Моделей';

CREATE TABLE `car_mark` (
  `id_car_mark` int(8) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `name` varchar(255) NOT NULL COMMENT 'Название марки',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Видимость',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  `name_rus` varchar(255) DEFAULT NULL COMMENT 'Назв. рус.',
  PRIMARY KEY (`id_car_mark`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Марки автомобилей';

CREATE TABLE `car_model` (
  `id_car_model` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `id_car_mark` int(11) NOT NULL COMMENT 'Марка автомобиля',
  `name` varchar(255) NOT NULL COMMENT 'Название модели',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Видимость',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  `name_rus` varchar(255) DEFAULT NULL COMMENT 'Название на русском',
  `is_error_ignore` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Игнорировать ошибки парсинга',
  PRIMARY KEY (`id_car_model`),
  KEY `id_car_mark` (`id_car_mark`),
  KEY `id_car_type` (`id_car_type`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Модели автомобилей';

CREATE TABLE `car_modification` (
  `id_car_modification` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `id_car_model` int(8) NOT NULL,
  `id_car_serie` int(11) NOT NULL COMMENT 'Серия автомобиля',
  `name` varchar(255) NOT NULL COMMENT 'Название модификции',
  `start_production_year` int(8) DEFAULT NULL COMMENT 'Год начала производства',
  `end_production_year` int(8) DEFAULT NULL COMMENT 'Год конца производства',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Видимость',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  `price_min` int(8) DEFAULT NULL COMMENT 'Минимальная цена',
  `price_max` int(8) DEFAULT NULL COMMENT 'Максимальная цена',
  PRIMARY KEY (`id_car_modification`),
  KEY `id_car_serie` (`id_car_serie`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Модификации автомобилей';

CREATE TABLE `car_serie` (
  `id_car_serie` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `id_car_model` int(8) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'Название серии',
  `is_visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Видимость',
  `id_car_generation` int(8) DEFAULT NULL COMMENT 'Поколение',
  `id_car_type` int(8) NOT NULL COMMENT 'Тип авто',
  PRIMARY KEY (`id_car_serie`),
  KEY `name` (`name`),
  KEY `id_car_type` (`id_car_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Cерии автомобилей';


CREATE TABLE `configurable_reference_vehicle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `modelId` int(11) DEFAULT NULL,
  `brandId` int(10) unsigned DEFAULT NULL,
  `productionYear` year(4) DEFAULT NULL,
  `transmissionType` smallint(6) DEFAULT NULL,
  `engineType` smallint(6) DEFAULT NULL,
  `regionId` int(11) DEFAULT NULL,
  `generationId` int(10) unsigned DEFAULT NULL,
  `cache` bit(6) NOT NULL,
  `weight` int(10) unsigned DEFAULT '0',
  `paramId` varchar(32) NOT NULL,
  `paramValue` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `params` (`paramId`,`modelId`,`brandId`,`productionYear`,`transmissionType`,`engineType`,`regionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `discount_types` (
  `discount_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) NOT NULL,
  `discount_type_name` varchar(255) DEFAULT NULL,
  `discount_type_disabled` tinyint(1) NOT NULL DEFAULT '0',
  `discount_type_unconditional` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`discount_type_id`),
  KEY `brand_id_discount_type_unconditional` (`discount_type_unconditional`,`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `old_models_map` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) unsigned NOT NULL,
  `new_model_id` int(11) DEFAULT NULL,
  `new_body_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `slmi_models` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  `model_id` int(11) unsigned DEFAULT NULL,
  `body_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `statuses` (
  `status_code` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `status_ord` int(11) NOT NULL,
  `status_name` varchar(255) NOT NULL,
  UNIQUE KEY `status_code` (`status_code`,`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `plainPassword` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('reference:guest','reference:admin','reference:manager','reference:user') NOT NULL,
  `photo` varchar(2048) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-updated` (`updatedAt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SQL
        );
    }

    public function safeDown(): void
    {
        $this->dropForeignKey('eqt_fk_equipment_model', 'eqt_equipment');
        $this->dropTable('eqt_equipment');
        $this->dropTable('bodies');
        $this->dropTable('brand_model_ids');
        $this->dropTable('brands');
        $this->dropTable('car_characteristic');
        $this->dropTable('car_characteristic_value');
        $this->dropTable('car_generation');
        $this->dropTable('car_mark');
        $this->dropTable('car_model');
        $this->dropTable('car_modification');
        $this->dropTable('car_serie');
        $this->dropTable('car_type');
        $this->dropTable('cities');
        $this->dropTable('configurable_reference_params_weights');
        $this->dropTable('configurable_reference_vehicle');
        $this->dropTable('crm_instructions');
        $this->dropTable('crms');
        $this->dropTable('discount_types');
        $this->dropTable('models');
        $this->dropTable('models_bodies');
        $this->dropTable('okopf');
        $this->dropTable('okved');
        $this->dropTable('old_models_map');
        $this->dropTable('regions');
        $this->dropTable('countries');
        $this->dropTable('federal_districts');
        $this->dropTable('slmi_models');
        $this->dropTable('sources');
        $this->dropTable('stat_models');
        $this->dropTable('statuses');
        $this->dropTable('users');
        $this->dropTable('works');
    }
}
