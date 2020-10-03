<?php

namespace infotech\reference\tests\unit\models\aeb;

use app\fixtures\AEBRegionUploadHistoryFixture;
use infotech\reference\models\aeb\AEBRegionUploadHistory;
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
        $this->assertNotNull(new AEBRegionUploadHistory());
    }

    public function testTableName()
    {
        $this->assertEquals('aeb_region_upload_history', AEBRegionUploadHistory::tableName());
    }

    public function testFind()
    {
        $this->assertInstanceOf(ActiveQuery::class, AEBRegionUploadHistory::find());
    }

    public function testAttributes()
    {
        $model = new AEBRegionUploadHistory();
        $this->assertEquals(
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
        $this->assertEquals([
            0 => 'Активная загрузка',
            1 => 'Выполенная загрузка',
        ], AEBRegionUploadHistory::getStatusList());
    }

    public function testGetImportStatusList()
    {
        $this->assertEquals([
            0 => 'Загрузка не запущена',
            1 => 'Выполняется загрузка',
            2 => 'Загрузка завершена',
        ], AEBRegionUploadHistory::getImportStatusList());
    }

    public function testStatusRequired()
    {
        $model = new AEBRegionUploadHistory();
        $this->assertFalse($model->validate(['status']));
        $this->assertEquals(['Status cannot be blank.'], $model->getErrors('status'));
    }

    public function testGetActiveUpload()
    {
        $this->assertNull(AEBRegionUploadHistory::getActiveUpload(false));
        $this->assertNotNull(AEBRegionUploadHistory::getActiveUpload(true));
    }
}
