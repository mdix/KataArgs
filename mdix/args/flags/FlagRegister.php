<?php

namespace mdix\args\flags;
require_once '../../../autoloader.php';

class FlagRegister {
    private $availableFlagClasses = array();

    public function __construct() {
        $this->findAvailableFlagClasses();
    }

    private function findAvailableFlagClasses() {
        $classnames = scandir(dirname(__FILE__));
        foreach ($classnames as $classname) {
            if (preg_match('/FlagKey[A-Za-z]{1}.php/', $classname)) {
                array_push($this->availableFlagClasses, str_replace('.php', '', $classname));
            }
        }
    }

    public function getAvailableFlagClasses() {
        return $this->availableFlagClasses;
    }
}