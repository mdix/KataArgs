<?php

namespace mdix\args\flags;
require_once '../../../autoloader.php';

class FlagKeydTest extends \PHPUnit_Framework_TestCase {
    private $object;

    public function setUp() {
        $this->object = new FlagKeyd();
    }

    public function testExists() {
        $this->assertInternalType('object', $this->object);
    }

    public function testParentIsStringFlag() {
        $this->assertEquals('mdix\args\flags\StringFlag', get_parent_class($this->object));
    }

    public function testKnowsItsEnding() {
        $this->assertEquals('d', $this->object->getArgKey());
    }

    public function testHasADefaultValue() {
        $this->assertEquals('', $this->object->getArgValue());
    }

    public function testSetArgValueWorksWithCorrectArgument() {
        $this->object->setArgValue('/var/log');
        $this->assertEquals('/var/log', $this->object->getArgValue());
    }

    public function testSetArgValueWithCorrectArgumentKeepsErrorMessageEmpty() {
        $this->object->setArgValue('/var/log');
        $this->assertEquals('', $this->object->getErrorMessage());
    }

    public function testSetArgValueWithWrongArgumentCausesErrorMessageToBeSet() {
        $this->object->setArgValue('');
        $this->assertNotEquals('', $this->object->getErrorMessage());
    }
}