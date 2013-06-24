<?php

namespace mdix\args\flags;
require_once '../../../autoloader.php';

class FlagRegister {
    private $availableFlagClasses = array();
    private $baseFlagClassName    = 'FlagKey';

    public function __construct() {
        $this->findAvailableFlagClasses();
    }

    private function findAvailableFlagClasses() {
        $classnames = scandir(dirname(__FILE__));
        foreach ($classnames as $classname) {
            if (preg_match('/^' . $this->baseFlagClassName . '[A-Za-z]{1}.php$/', $classname)) {
                array_push($this->availableFlagClasses, str_replace('.php', '', $classname));
            }
        }
    }

    public function getAvailableFlagClasses() {
        return $this->availableFlagClasses;
    }

    public function getFlagObjectForKey($key) {
        $possibleClassName = $this->baseFlagClassName . $key;
        $positionInArray   = array_search($possibleClassName, $this->availableFlagClasses);

        if ($positionInArray === false) {
            return new FlagKeyNull();
        }

        $flagObject = __NAMESPACE__ . '\\' . $this->availableFlagClasses[$positionInArray];
        return new $flagObject();
    }
}