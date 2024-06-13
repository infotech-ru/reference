<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\ActiveQuery;
use infotech\reference\models\ActiveRecord;
use infotech\reference\models\autoru\queries\AutoruMapFolderQuery;
use infotech\reference\models\Generation;
use infotech\reference\models\Model;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%autoru_map_folder}}".
 *
 * @property int $id
 * @property string $name
 * @property int $mark_id
 * @property int $model_id
 * @property int $autoru_generation_id
 * @property int $autoru_model_id
 * @property int $model_is_recent
 *
 * @property AutoruMark $mark
 * @property Model $model
 * @property Generation $generation
 * @property Generation[] $generations
 * @property AutoruFolderGeneration[] $folderGenerations
 * @property AutoruFolderModels[] $folderModels
 */
class AutoruFolder extends ActiveRecord
{
    public static function tableName(): string
    {
        return 'eqt_autoru_folder';
    }

    /** @param int|int[] $brand_id */
    public static function getModelList($brand_id)
    {
        if (!$brand_id) {
            return [];
        }
        return ArrayHelper::map(
            Model::find()
                ->where(['brand_id' => $brand_id, 'is_deleted' => 0,])
                ->orderBy(['name' => SORT_ASC])
                ->all(),
            'id',
            'name',
            function (Model $model) {
                return $model->is_recent ? 'Актуальные' : 'Не актуальные';
            }
        );
    }

    public static function getGenerationList(?int $model_id)
    {
        if (!$model_id) {
            return [];
        }
        return ArrayHelper::map(
            Generation::find()
                ->innerJoinWith(
                    [
                        'series' => function (ActiveQuery $query) use ($model_id) {
                            $query->innerJoinWith(
                                [
                                    'referenceModel' => function (ActiveQuery $query) use ($model_id) {
                                        $query->andWhere(['models.id' => $model_id]);
                                    }
                                ]
                            );
                        }
                    ]
                )->orderBy([Generation::tableName() . '.name' => SORT_ASC])
                ->all(),
            'id_car_generation',
            'name',
            function (Generation $model) {
                return $model->is_recent ? 'Актуальные' : 'Не актуальные';
            }
        );
    }


    public function rules(): array
    {
        return [
            [['id'], 'required'],
            [['id', 'mark_id', 'model_id', 'model_is_recent', 'autoru_generation_id', 'autoru_model_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [
                ['mark_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => AutoruMark::class,
                'targetAttribute' => ['mark_id' => 'id']
            ],
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($this->isAttributeChanged('model_id')) {
            $model = Model::findOne($this->model_id);
            if ($model) {
                $this->model_is_recent = $model->is_recent;
            }
        }

        return true;
    }


    public function attributeLabels(): array
    {
        return [
            'id' => 'ИД (AutoRu)',
            'name' => 'Модель (AutoRu)',
            'mark_id' => 'Марка',
            'model_id' => 'Модель',
        ];
    }

    public function getMark()
    {
        return $this->hasOne(AutoruMark::class, ['id' => 'mark_id']);
    }

    public static function find(): AutoruMapFolderQuery
    {
        return new AutoruMapFolderQuery(static::class);
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }

    public function getGeneration()
    {
        return $this->hasOne(Generation::class, ['id_car_generation' => 'generation_id'])->via('folderGenerations');
    }

    public function getGenerations()
    {
        return $this->hasMany(Generation::class, ['id_car_generation' => 'generation_id'])->via('folderGenerations');
    }

    public function getFolderGenerations()
    {
        return $this->hasMany(AutoruFolderGeneration::class, ['folder_id' => 'id']);
    }

    public function getFolderModels()
    {
        return $this->hasMany(AutoruFolderModels::class, ['folder_id' => 'id']);
    }
}
