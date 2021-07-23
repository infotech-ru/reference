<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Generation;
use infotech\reference\models\GenerationQuery;
use PHPUnit\Framework\TestCase;

class GenerationQueryTest extends TestCase
{
    public function testConstructor()
    {
        self::assertInstanceOf(ActiveQuery::class, new GenerationQuery(Generation::class));
    }

    public function testIsVisible()
    {
        $query = new GenerationQuery(Generation::class);
        self::assertEquals($query, $query->isVisible());
        self::assertEquals(['car_generation.is_visible' => true], $query->where);

        $query = new GenerationQuery(Generation::class);
        self::assertEquals($query, $query->isVisible(1));
        self::assertEquals(['car_generation.is_visible' => 1], $query->where);
    }

    public function testIsRecent()
    {
        $query = new GenerationQuery(Generation::class);
        self::assertEquals($query, $query->isRecent());
        self::assertEquals(['car_generation.is_recent' => true], $query->where);

        $query = new GenerationQuery(Generation::class);
        self::assertEquals($query, $query->isRecent(1));
        self::assertEquals(['car_generation.is_recent' => 1], $query->where);
    }

    public function testModel()
    {
        $query = new GenerationQuery(Generation::class);
        self::assertEquals($query, $query->model(1));
        self::assertEquals(
            'SELECT * FROM `car_generation` WHERE (`car_generation`.`model_id`=:qp0) OR '
            . '(EXISTS (SELECT `id_car_serie` FROM `car_serie` WHERE (`car_serie`.`model_id`=:qp1) AND '
            . '(`car_serie`.`id_car_generation`=car_generation.id_car_generation)))',
            $query->createCommand()->sql
        );

        $query = new GenerationQuery(Generation::class);
        self::assertEquals($query, $query->model([1, 2]));
        self::assertEquals(
            'SELECT * FROM `car_generation` WHERE (`car_generation`.`model_id` IN (:qp0, :qp1)) OR '
            . '(EXISTS (SELECT `id_car_serie` FROM `car_serie` WHERE (`car_serie`.`model_id` IN (:qp2, :qp3)) AND '
            . '(`car_serie`.`id_car_generation`=car_generation.id_car_generation)))',
            $query->createCommand()->sql
        );
    }

    public function testYear()
    {
        $query = new GenerationQuery(Generation::class);
        self::assertEquals($query, $query->year(null));
        self::assertEquals(null, $query->where);

        $query = new GenerationQuery(Generation::class);
        self::assertEquals($query, $query->year('test'));
        self::assertEquals(null, $query->where);

        $query = new GenerationQuery(Generation::class);
        self::assertEquals($query, $query->year('2018'));
        self::assertEquals(
            [
                'OR',
                [
                    'AND',
                    ['<=', "car_generation.year_begin", '2018'],
                    [
                        'OR',
                        ['>=', "car_generation.year_end", '2018'],
                        "car_generation.year_end" => null,
                    ],
                ]
            ],
            $query->where
        );

        $query = new GenerationQuery(Generation::class);
        self::assertEquals($query, $query->year(2018));
        self::assertEquals(
            [
                'OR',
                [
                    'AND',
                    ['<=', "car_generation.year_begin", '2018'],
                    [
                        'OR',
                        ['>=', "car_generation.year_end", '2018'],
                        "car_generation.year_end" => null,
                    ],
                ]
            ],
            $query->where
        );

        $query = new GenerationQuery(Generation::class);
        self::assertEquals($query, $query->year([2018, 2019]));
        self::assertEquals(
            [
                'OR',
                [
                    'AND',
                    ['<=', "car_generation.year_begin", '2018'],
                    [
                        'OR',
                        ['>=', "car_generation.year_end", '2018'],
                        "car_generation.year_end" => null,
                    ],
                ],
                [
                    'AND',
                    ['<=', "car_generation.year_begin", '2019'],
                    [
                        'OR',
                        ['>=', "car_generation.year_end", '2019'],
                        "car_generation.year_end" => null,
                    ],
                ]
            ],
            $query->where
        );
    }
}
