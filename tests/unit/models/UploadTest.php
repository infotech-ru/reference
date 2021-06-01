<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\Upload;
use infotech\reference\models\UploadQuery;
use infotech\reference\tests\fixtures\UploadFixture;
use PHPUnit\Framework\TestCase;
use yii\behaviors\TimestampBehavior;
use yii\test\FixtureTrait;

class UploadTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            UploadFixture::class,
        ];
    }

    public function setUp(): void
    {
        $this->loadFixtures();
    }

    public function tearDown(): void
    {
        $this->unloadFixtures();
    }

    public function testConstructor(): void
    {
        self::assertNotNull(new Upload());
    }

    public function testTableName(): void
    {
        self::assertEquals('dsf_upload', Upload::tableName());
    }

    public function testFind(): void
    {
        self::assertInstanceOf(UploadQuery::class, Upload::find());
    }

    public function testAttributes(): void
    {
        $model = new Upload();
        self::assertEquals(
            [
                'id',
                'type',
                'filename',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }

    public function testTypeSelectel(): void
    {
        self::assertEquals('selectel', Upload::TYPE_SELECTEL);
    }

    public function testBehavoirs(): void
    {
        $model = new Upload();
        self::assertArrayHasKey(0, $model->behaviors());
        self::assertArrayHasKey('class', $model->behaviors()[0]);
        self::assertArrayHasKey(TimestampBehavior::class, $model->behaviors()[0]['class']);
    }
}
