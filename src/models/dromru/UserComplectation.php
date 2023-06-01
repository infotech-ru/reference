<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "dromru_user_complectation".
 *
 * @property int $id
 * @property string $name
 * @property integer $dromru_model_id
 * @property integer $dromru_complectation_id
 *
 * @property-read UserComplectationMap[] $userComplectationMaps
 * @property-read UserModificationMap[] $userModificationMaps
 * @property-read Model $dromRuModel
 *
 */
class UserComplectation extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'dromru_user_complectation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'dromru_complectation_id', 'dromru_model_id'], 'required'],
            [['dromru_complectation_id', 'dromru_model_id'], 'integer'],
        ];
    }

    public function getDromRuModel(): ActiveQuery
    {
        return $this->hasOne(Model::class, ['id' => 'dromru_model_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getComplectationMaps(): ActiveQuery
    {
        return $this->hasMany(UserComplectationMap::class, ['user_complectation_id' => 'id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getModificationMaps(): ActiveQuery
    {
        return $this->hasMany(UserModificationMap::class, ['user_complectation_id' => 'id']);
    }
}
