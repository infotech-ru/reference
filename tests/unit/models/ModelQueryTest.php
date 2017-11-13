<?php

namespace infotech\reference\tests\unit\models;


use infotech\reference\models\ActiveQuery;
use infotech\reference\models\Model;
use infotech\reference\models\ModelQuery;
use PHPUnit\Framework\TestCase;

class ModelQueryTest extends TestCase
{
    public function testConstructor()
    {
        $this->assertInstanceOf(ActiveQuery::class, new ModelQuery(Model::class));
    }

    public function testIsRecent()
    {
        $query = new ModelQuery(Model::class);
        $query->isRecent();
        $this->assertEquals(['models.is_recent' => true], $query->where);

        $query = new ModelQuery(Model::class);
        $query->isRecent(1);
        $this->assertEquals(['models.is_recent' => 1], $query->where);
    }

    public function testIsDeleted()
    {
        $query = new ModelQuery(Model::class);
        $query->isDeleted();
        $this->assertEquals(['models.is_deleted' => true], $query->where);

        $query = new ModelQuery(Model::class);
        $query->isDeleted(1);
        $this->assertEquals(['models.is_deleted' => 1], $query->where);
    }
}