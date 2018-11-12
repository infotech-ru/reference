<?php
/**
 * Created by PhpStorm.
 * User: yakov
 * Date: 08.11.2018
 * Time: 12:56
 */

namespace infotech\reference\models\aeb;

use yii\behaviors\TimestampBehavior;
use infotech\reference\models\ActiveRecord;
use yii\db\Expression;

/**
 * Class CityMapping
 * @package app\models
 *
 * @property int $id
 * @property int $region_id
 * @property int $city_id
 * @property int $aeb_region_upload_history_id
 * @property string $name
 * @property string $created_at
 *
 * @property \infotech\reference\models\Region $region
 * @property \infotech\reference\models\City $city
 */
class CityMapping extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'aeb_city_mapping';
    }

    public function rules(): array
    {
        return [
            [
                ['name', 'region_id', 'city_id', 'aeb_region_upload_history_id'],
                'required'
            ],
            [['region_id'], 'exist', 'targetClass' => \infotech\reference\models\Region::class, 'targetAttribute' => 'id'],
            [['city_id'], 'exist', 'targetClass' => \infotech\reference\models\City::class, 'targetAttribute' => 'id'],
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
            TemporaryAEBRegionData::updateAll(['city_id' => $this->city_id], [
                'city' => $this->name,
                'region_id' => $this->region_id,
            ]);
        }
    }

    public function afterDelete()
    {
        parent::afterDelete();

        TemporaryAEBRegionData::updateAll(['city_id' => null], [
            'city' => $this->name,
            'region_id' => $this->region_id,
        ]);
    }


    public function attributeLabels()
    {
        return [
            'name' => \Yii::t('app', 'Название'),
            'region_id' => \Yii::t('app', 'ID региона'),
            'city_id' => \Yii::t('app', 'ID города'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(\infotech\reference\models\Region::class, ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(\infotech\reference\models\City::class, ['id' => 'city_id']);
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
}