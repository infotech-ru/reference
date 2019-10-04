<?php
/**
 * Created by PhpStorm.
 * User: yakov
 * Date: 08.11.2018
 * Time: 12:56
 */

namespace infotech\reference\models\aeb;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\Brand;
use infotech\reference\models\Model;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\Expression;

/**
 * Class ModelMapping
 * @package app\models
 *
 * @property int $id
 * @property int $brand_id
 * @property int $model_id
 * @property int $aeb_region_upload_history_id
 * @property string $name
 * @property string $created_at
 *
 * @property Model $model
 * @property Brand $brand
 */
class ModelMapping extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'aeb_model_mapping';
    }

    public function rules(): array
    {
        return [
            [
                ['name', 'brand_id', 'model_id', 'aeb_region_upload_history_id'],
                'required'
            ],
            [['model_id'], 'exist', 'targetClass' => Model::class, 'targetAttribute' => 'id'],
            [['aeb_region_upload_history_id'], 'exist', 'targetClass' => AEBRegionUploadHistory::class, 'targetAttribute' => 'id'],
        ];
    }

    public function beforeValidate()
    {
        if (!$this->aeb_region_upload_history_id) {
            $this->aeb_region_upload_history_id = AEBRegionUploadHistory::getActiveUpload()->id;
        }

        return parent::beforeValidate();
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if ($insert) {
            TemporaryAEBRegionData::updateAll(['model_id' => $this->model_id], [
                'model' => $this->name,
                'brand_id' => $this->brand_id,
            ]);
        }
    }

    public function afterDelete()
    {
        parent::afterDelete();

        TemporaryAEBRegionData::updateAll(['model_id' => null], [
            'model' => $this->name,
            'brand_id' => $this->brand_id,
        ]);
    }


    public function attributeLabels()
    {
        return [
            'name' => Yii::t('app', 'Название для сопоставления'),
            'model_id' => Yii::t('app', 'ID модели'),
            'brand_id' => Yii::t('app', 'ID бренда'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
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

    public function getAEBRegionUploadHistory()
    {
        return $this->hasOne(AEBRegionUploadHistory::class, ['id' => 'aeb_region_upload_history_id']);
    }
}
