<?php

namespace app\fixtures;

use infotech\reference\models\aeb\AEBRegionUploadHistory;
use yii\test\ActiveFixture;

class AEBRegionUploadHistoryFixture extends ActiveFixture
{
    public $modelClass = AEBRegionUploadHistory::class;
    public $depends = [];
    public $db = 'ref_db';
}