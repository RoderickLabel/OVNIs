<?php

use PHPUnit\Framework\TestCase;
use Ovni\Group;

class GroupTest extends TestCase 
{

    private $group;

    protected function setUp()
    {
        $this->group = new Group("ENCKE", "VERMELHO");
        parent::setUp();
    }

    public function testGetComet()
    {
        $this->assertEquals("ENCKE", $this->group->getComet());
    }

    public function testGetGroup()
    {
        $this->assertEquals("VERMELHO", $this->group->getGroup());
    }
}