<?php

namespace infotech\reference\models\autoru;

use infotech\reference\models\Model;

class AutoruFolderModels
{
    public static function tableName()
    {
        return 'eqt_autoru_folder_models';
    }

    public function getAutoruFolder()
    {
        return $this->hasOne(AutoruFolder::class, ['id' => 'folder_id']);
    }

    public function getModel()
    {
        return $this->hasOne(Model::class, ['id' => 'model_id']);
    }
}
