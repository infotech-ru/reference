<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "dromru_user_modification_map".
 *
 * @property int $user_complectation_id
 * @property int $ref_modification_id
 *
 */
class UserModificationMap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'dromru_user_modification_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_complectation_id', 'ref_modification_id'], 'required'],
            [['user_complectation_id', 'ref_modification_id'], 'integer'],
        ];
    }

    public function getUserComplectation(): ActiveQuery
    {
        return $this->hasOne(UserComplectation::class, ['id' => 'user_complectation_id']);
    }
}
