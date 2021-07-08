<?php

namespace infotech\reference\tests\unit\models;

use infotech\reference\models\GenerationFile;
use infotech\reference\models\GenerationFileQuery;
use infotech\reference\models\GenerationQuery;
use infotech\reference\models\UploadQuery;
use infotech\reference\tests\fixtures\GenerationFileFixture;
use PHPUnit\Framework\TestCase;
use Yii;
use yii\test\FixtureTrait;

class GenerationFileTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            GenerationFileFixture::class,
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
        self::assertNotNull(new GenerationFile());
    }

    public function testTableName(): void
    {
        self::assertEquals('generation_file', GenerationFile::tableName());
    }

    public function testFind(): void
    {
        self::assertInstanceOf(GenerationFileQuery::class, GenerationFile::find());
    }

    public function testGetGeneration(): void
    {
        $model = new GenerationFile();
        self::assertInstanceOf(GenerationQuery::class, $model->getGeneration());
    }

    public function testGetUpload(): void
    {
        $model = new GenerationFile();
        self::assertInstanceOf(UploadQuery::class, $model->getUpload());
    }

    public function testAttributes(): void
    {
        $model = new GenerationFile();
        self::assertEquals(
            [
                'id',
                'generation_id',
                'upload_id',
                'type',
                'name',
            ],
            $model->attributes()
        );
    }

    public function testTypeDocument(): void
    {
        self::assertEquals(1, GenerationFile::TYPE_DOCUMENT);
    }

    public function testGetTypeList(): void
    {
        self::assertEquals(
            [GenerationFile::TYPE_DOCUMENT => Yii::t('app', 'Документация'),],
            GenerationFile::getTypeList()
        );
    }
}
