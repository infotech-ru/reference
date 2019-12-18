<?php
/**
 * Created by PhpStorm.
 * User: Raidkon
 * Date: 26.12.2018
 * Time: 17:06
 */

namespace infotech\reference\models\aeb;

use infotech\reference\models\ActiveRecord;
use infotech\reference\models\Brand;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "aeb_brand_mapping".
 *
 * @property int $id
 * @property int $brand_id
 * @property string $name
 * @property string $created_at
 */
class BrandMapping extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aeb_brand_mapping';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brand_id', 'name'], 'required'],
            [['brand_id'], 'integer'],
            [['name'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'brand_id' => Yii::t('app', 'Brand ID'),
            'name' => Yii::t('app', 'Name'),
            'created_at' => Yii::t('app', 'Created At'),
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

    public function getBrand()
    {
        return $this->hasOne(Brand::class, ['id' => 'brand_id']);
    }
}
