<?php
/**
 * Created by PhpStorm.
 * User: yakov
 * Date: 08.11.2018
 * Time: 3:39
 */

namespace infotech\reference\models\aeb;

use infotech\reference\models\ActiveRecord;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * Class AEBRegionUploadHistory
 * @package app\components\queue
 *
 * @property int $id
 * @property int $status
 * @property int $year
 * @property int $import_status
 * @property int $imported_success
 * @property int $imported_errors
 * @property string $created_at
 * @property string $updated_at
 */
class AEBRegionUploadHistory extends ActiveRecord
{
    const STATUS_ACTIVE = 0;
    const STATUS_COMPETED = 1;

    const IMPORT_STATUS_NEW = 0;
    const IMPORT_STATUS_RUNNING = 1;
    const IMPORT_STATUS_DONE = 2;

    public static function tableName()
    {
        return 'aeb_region_upload_history';
    }

    public function rules(): array
    {
        return [
            [
                [
                    'status',
                    'year',
                ],
                'required'
            ],
            ['import_status', 'in', 'range' => array_keys(self::getImportStatusList())],
            ['status', 'in', 'range' => array_keys(self::getStatusList())],
        ];
    }

    public static function getStatusList(): array
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Активная загрузка'),
            self::STATUS_COMPETED => Yii::t('app', 'Выполенная загрузка'),
        ];
    }

    public static function getImportStatusList(): array
    {
        return [
            self::IMPORT_STATUS_NEW => Yii::t('app', 'Загрузка не запущена'),
            self::IMPORT_STATUS_RUNNING => Yii::t('app', 'Выполняется загрузка'),
            self::IMPORT_STATUS_DONE => Yii::t('app', 'Загрузка завершена'),
        ];
    }

    public function behaviors(): array
    {
        return [
            TimestampBehavior::class => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'created_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @param bool $createNew
     * @return self
     */
    public static function getActiveUpload($createNew = true)
    {
        $upload = self::findOne(['status' => self::STATUS_ACTIVE]);
        if (!$upload && $createNew) {
            $upload = new self();
            $upload->status = self::STATUS_ACTIVE;
            $upload->year = date('Y');
            $upload->import_status = self::IMPORT_STATUS_NEW;
            $upload->imported_success = 0;
            $upload->imported_errors = 0;
            $upload->save();
        }

        return $upload;
    }
}