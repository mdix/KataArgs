<?php

namespace mdix\args\flags;
require_once '../../../autoloader.php';

class FlagRegisterTest extends \PHPUnit_Framework_TestCase {
    private $object;

    public function setUp() {
        $this->object = new FlagRegister();
    }

    public function testFindsAllAvailableFlags() {
        $this->assertCount(3, $this->object->getAvailableFlagClasses());
    }

    public function testStoresTheWholeClassNamesWithoutExtension() {
        foreach($this->object->getAvailableFlagClasses() as $className) {
            $this->assertRegExp('/^FlagKey[A-Za-z]{1}$/', $className);
        }
    }

    public function testGetFlagObjectForFlagKeyReturnsFlagIfPresent() {
        $this->assertInstanceOf(__NAMESPACE__ . '\FlagKeyp', $this->object->getFlagObjectForKey('p'));
    }

    public function testGetFlagObjectForFlagKeyReturnsNullObject() {
        $this->assertInstanceOf(__NAMESPACE__ . '\FlagKeyNull', $this->object->getFlagObjectForKey('z'));
    }
}