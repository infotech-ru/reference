<?php

namespace infotech\reference\models\dromru;

use infotech\reference\models\Modification;
use infotech\reference\models\ActiveRecord;

/**
 * This is the model class for table "dromru_user_complectation_map".
 *
 * @property int $user_complectation_id
 * @property int $ref_equipment_id
 *
 */
class UserComplectationMap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'dromru_user_complectation_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_complectation_id', 'ref_equipment_id'], 'required'],
            [['user_complectation_id', 'ref_equipment_id'], 'integer'],
        ];
    }

    public function getUserComplectation()
    {
        return $this->hasOne(UserComplectation::class, ['id' => 'user_complectation_id']);
    }
}
