<?php

namespace mdix\args\flags;
require_once '../../../autoloader.php';

class FlagKeypTest extends \PHPUnit_Framework_TestCase {
    private $object;

    public function setUp() {
        $this->object = new FlagKeyp();
    }

    public function testExists() {
        $this->assertInternalType('object', $this->object);
    }

    public function testParentIsBoolFlag() {
        $this->assertEquals('mdix\args\flags\StringFlag', get_parent_class($this->object));
    }

    public function testKnowsItsArgKey() {
        $this->assertEquals('p', $this->object->getArgKey());
    }

    public function testHasADefaultValue() {
        $this->assertEquals(8080, $this->object->getArgValue());
    }

    public function testSetArgValueWorksWithCorrectArgument() {
        $this->object->setArgValue('81');
        $this->assertEquals(81, $this->object->getArgValue());
    }

    public function testSetArgValueWithCorrectArgumentKeepsErrorMessageEmpty() {
        $this->object->setArgValue('81');
        $this->assertEquals('', $this->object->getErrorMessage());
    }

    public function testSetArgValueWithWrongArgumentCausesErrorMessageToBeSet() {
        $this->object->setArgValue('some string');
        $this->assertNotEquals('', $this->object->getErrorMessage());
    }
}