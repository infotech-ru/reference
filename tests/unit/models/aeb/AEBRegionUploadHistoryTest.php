<?php

namespace infotech\reference\tests\unit\models\aeb;

use infotech\reference\models\aeb\AEBRegionUploadHistory;
use infotech\reference\tests\fixtures\AEBRegionUploadHistoryFixture;
use PHPUnit\Framework\TestCase;
use yii\db\ActiveQuery;
use yii\test\FixtureTrait;

class AEBRegionUploadHistoryTest extends TestCase
{
    use FixtureTrait;

    public function fixtures()
    {
        return [
            AEBRegionUploadHistoryFixture::class,
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

    public function testConstructor()
    {
        self::assertNotNull(new AEBRegionUploadHistory());
    }

    public function testTableName()
    {
        self::assertEquals('aeb_region_upload_history', AEBRegionUploadHistory::tableName());
    }

    public function testFind()
    {
        self::assertInstanceOf(ActiveQuery::class, AEBRegionUploadHistory::find());
    }

    public function testAttributes()
    {
        $model = new AEBRegionUploadHistory();
        self::assertEquals(
            [
                'id',
                'status',
                'year',
                'import_status',
                'imported_success',
                'imported_errors',
                'created_at',
                'updated_at',
            ],
            $model->attributes()
        );
    }

    public function testSetStatusList()
    {
        self::assertEquals(
            [
                0 => 'Активная загрузка',
                1 => 'Выполенная загрузка',
            ],
            AEBRegionUploadHistory::getStatusList()
        );
    }

    public function testGetImportStatusList()
    {
        self::assertEquals(
            [
                0 => 'Загрузка не запущена',
                1 => 'Выполняется загрузка',
                2 => 'Загрузка завершена',
            ],
            AEBRegionUploadHistory::getImportStatusList()
        );
    }

    public function testStatusRequired()
    {
        $model = new AEBRegionUploadHistory();
        self::assertFalse($model->validate(['status']));
        self::assertEquals(['Status cannot be blank.'], $model->getErrors('status'));
    }

    public function testGetActiveUpload()
    {
        self::assertNull(AEBRegionUploadHistory::getActiveUpload(false));
        self::assertNotNull(AEBRegionUploadHistory::getActiveUpload(true));
    }
}
