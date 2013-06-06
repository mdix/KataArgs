<?php

namespace mdix\args\flags;
require_once '../../../autoloader.php';

class FlagKeylTest extends \PHPUnit_Framework_TestCase {
    private $object;

    public function setUp() {
        $this->object = new FlagKeyl();
    }

    public function testExists() {
        $this->assertInternalType('object', $this->object);
    }

    public function testParentIsBoolFlag() {
        $this->assertEquals('mdix\args\flags\BoolFlag', get_parent_class($this->object));
    }

    public function testKnowsItsArgKey() {
        $this->assertEquals('l', $this->object->getArgKey());
    }

    public function testHasADefaultValue() {
        $this->assertEquals(false, $this->object->getArgValue());
    }

    public function testSetArgValueWorksWithCorrectArgument() {
        $this->object->setArgValue('');
        $this->assertEquals(true, $this->object->getArgValue());
    }

    public function testSetArgValueWithCorrectArgumentKeepsErrorMessageEmpty() {
        $this->object->setArgValue('');
        $this->assertEquals('', $this->object->getErrorMessage());
    }

    public function testSetArgValueWithWrongArgumentCausesErrorMessageToBeSet() {
        $this->object->setArgValue('string value');
        $this->assertNotEquals('', $this->object->getErrorMessage());
    }
}