<?php

namespace app\fixtures;

use infotech\reference\models\ModelAlias;
use yii\test\ActiveFixture;

class ModelAliasFixture extends ActiveFixture
{
    public $modelClass = ModelAlias::class;
    public $depends = [BrandFixture::class, ModelFixture::class, GenerationFixture::class, SerieFixture::class, ModificationFixture::class];
    public $db = 'ref_db';
}